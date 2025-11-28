<?php

namespace Webkul\Sms\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Webkul\Sms\Models\OtpCode;

class OtpService
{
    public function generate(
        string $phone,
        string $purpose,
        int $digits,
        int $ttlMinutes,
        int $maxAttempts = 5,
        ?string $ip = null,
        ?string $ua = null
    ): OtpCode {
        // Invalidate previous active records for same phone/purpose
        OtpCode::where('phone', $phone)
            ->where('purpose', $purpose)
            ->whereNull('consumed_at')
            ->update(['consumed_at' => now()]);

        $code  = (string) random_int(10 ** ($digits - 1), (10 ** $digits) - 1);
        $token = Str::random(40);

        $record = OtpCode::create([
            'token'        => $token,
            'phone'     => $phone,
            'purpose'      => $purpose,
            'otp_hash'    => Hash::make($code),
            'digits'       => $digits,
            'attempts'     => 0,
            'max_attempts' => $maxAttempts,
            'expires_at'   => now()->addMinutes($ttlMinutes),
            'ip'           => $ip,
            'user_agent'   => $ua,
        ]);

        // Attach plaintext code transiently (not persisted)
        $record->plain_code = $code;

        return $record;
    }

    public function verify(string $token, string $code, string $purpose): ?OtpCode
    {
        $rec = OtpCode::where('token', $token)
            ->where('purpose', $purpose)
            ->first();

        if (! $rec) {
            return null;
        }

        if ($rec->consumed_at || $rec->expires_at->isPast()) {
            return null;
        }

        if ($rec->attempts >= $rec->max_attempts) {
            return null;
        }

        // Increment attempts first to avoid race
        $rec->increment('attempts');

        if (! Hash::check($code, $rec->otp_hash)) {
            return null;
        }

        $rec->consumed_at = now();
        $rec->save();

        return $rec;
    }
}
