<?php

declare(strict_types=1);

namespace Webkul\Sms\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Webkul\Sms\Facades\Sms;
use Webkul\Sms\Services\OtpService;
use Webkul\Sms\Models\OtpCode;

class OtpController extends Controller
{
    public function __construct(protected OtpService $otp) {}

  public function send(Request $request)
{
    $phone = $request->input('phone') ?? $request->input('phone');

    if (!str_starts_with($phone, '60')) {
        $phone = '60' . ltrim($phone, '0');
    }
    $request->merge(['phone' => $phone]);

    $request->validate(['phone' => ['required','string']]);

    if (DB::table('marketplace_sellers')->where('phone',$phone)->exists()) {
         return response()->json(['status'=>'error','message'=>trans('marketplace::app.seller.signup.phone-already-registered')], 422);
    }

    $purpose      = config('sms.otp.purpose', 'seller_register');
    $cooldown     = (int) config('sms.otp.cooldown_seconds', 60);
    $ipWindowMin  = (int) config('sms.otp.rate_limit_window_min', 10);
    $ipMax        = (int) config('sms.otp.rate_limit_max_per_ip', 5);

    // Per-IP rate limit
    $recentByIp = OtpCode::where('ip', $request->ip())
        ->where('created_at', '>=', now()->subMinutes($ipWindowMin))
        ->count();

    if ($recentByIp >= $ipMax) {
        return response()->json([
            'status'      => 'error',
            'message'     => trans('marketplace::app.seller.signup.too-many-requests'),
            'retry_after' => $cooldown,
        ], 429);
    }

    // Cool-down per phone + purpose
    $last = OtpCode::where('phone', $phone)
        ->where('purpose', $purpose)
        ->latest('id')
        ->first();

    if ($last) {
        $since = now()->diffInSeconds($last->created_at);
        if ($since < $cooldown) {
            return response()->json([
                'status'      => 'error',
                'message'     => trans('marketplace::app.seller.signup.otp-too-soon'),
                'retry_after' => $cooldown - $since,
            ], 429);
        }
    }

    // Generate & send (your existing code)
    $digits      = (int) config('sms.otp.digits', 6);
    $ttl         = (int) config('sms.otp.ttl_minutes', 5);
    $maxAttempts = (int) config('sms.otp.max_attempts', 5);

    $rec = $this->otp->generate(
        phone:     $phone,
        purpose:     $purpose,
        digits:      $digits,
        ttlMinutes:  $ttl,
        maxAttempts: $maxAttempts,
        ip:          $request->ip(),
        ua:          (string) $request->userAgent(),
    );

    Sms::send($phone, "Your verification code is {$rec->plain_code}. It expires in {$ttl} minutes.");

    return response()->json([
        'status'     => 'ok',
        'token'      => $rec->token,
        'otp_token'  => $rec->token,
        'message'    => trans('marketplace::app.seller.signup.otp-sent'),
        'expires_in' => $ttl * 60,
        'retry_after'=> $cooldown, // tell UI how long to disable
    ]);
}
    public function verify(Request $request)
    {
        // Accept token/otp or otp_token/otp_code (normalize)
        $token = $request->input('token') ?? $request->input('otp_token');
        $otp   = $request->input('otp') ?? $request->input('otp_code');

        $request->merge(['token' => $token, 'otp' => $otp]);

        $request->validate([
            'token' => ['required', 'string', 'min:20'],
            'otp'   => ['required', 'string'],
        ]);

        $purpose = config('sms.otp.purpose', 'seller_register');

        $rec = $this->otp->verify($token, $otp, $purpose);

        if (! $rec) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid or expired OTP.',
            ], 422);
        }

        // Persist the verified phone in session for final registration
        session(['otp_verified_phone' => $rec->phone]);

        return response()->json([
            'status'  => 'verified',
            'message' => 'OTP verified.',
        ]);
    }
}
