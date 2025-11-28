<?php

namespace Webkul\Sms\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Webkul\Marketplace\Repositories\SellerRepository;
use Webkul\Sms\Models\OtpCode;

class RegisterController extends Controller
{
    public function __construct(protected SellerRepository $sellerRepository) {}

    public function store(Request $request)
    {

        $phone = $request->input('phone') ?? $request->input('phone');

        if (!str_starts_with($phone, '60')) {
            $phone = '60' . ltrim($phone, '0');
        }

        $request->merge(['phone' => $phone]);
        $validated = $request->validate([
            'name'                  => ['required','string','max:150'],
            'url'                   => ['required','string','max:255'],
            'email'                 => ['required','email','unique:marketplace_sellers,email'],
            'phone'                 => ['required','regex:/^[0-9+\-()\s]{8,20}$/','unique:marketplace_sellers,phone'],
            'password'              => ['required','min:6','confirmed'],
        ]);


        if (session('otp_verified_phone') !==  $phone) {
            return back()->withErrors(['phone' => 'Please verify your phone number via OTP before registering.'])
                 ->withInput();
        }   

        $purpose = config('sms.otp.purpose', 'seller_register');
        $verified = OtpCode::where('phone',  $phone)
            ->where('purpose', $purpose)->whereNotNull('consumed_at')->exists();
        if (! $verified) {
            return back()->withErrors(['phone' => 'Please verify your phone number via OTP before registering.'])->withInput();
        }

        // 3) Clear session flag so it can’t be reused
        session()->forget('otp_verified_phone');

        // 4) Create seller (pass only real columns)
        $this->sellerRepository->create([
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'url'         => $validated['url'],
            'password'    => $validated['password'], // hash here if repo doesn’t
            'is_approved' => ! core()->getConfigData('marketplace.settings.seller.approval_required'),
        ]);

        return redirect()->route('seller.session.index')->with('success', 'Account created. You can sign in.');
    }
}
