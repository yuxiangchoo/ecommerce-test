<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Core\Rules\Slug;
use Webkul\Marketplace\Repositories\SellerRepository;
use Illuminate\Routing\Controller; // ✅ use Laravel's base controller

class RegistrationController extends Controller
{
    public function __construct(protected SellerRepository $sellerRepository) {}

    /**
     * Display the registration form.
     */
    public function index(): View
    {
        return view('marketplace::seller.sign-up');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $phone = $request->input('phone') ?? $request->input('phone');

        if (!str_starts_with($phone, '60')) {
            $phone = '60' . ltrim($phone, '0');
        }

        $request->merge(['phone' => $phone]);

        $validated = $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:marketplace_sellers,email'],
            'phone'  =>  ['required', 'regex:/^[0-9+\-()\s]{8,20}$/', 'unique:marketplace_sellers,phone'],
            'url'       => ['required', 'unique:marketplace_sellers,url', 'lowercase', new Slug],
            'password'  => ['required', 'confirmed', 'min:6'],
            // these are still validated so the UI enforces entry,
            // but we won't store them in the seller record:
            'otp_code'  => ['required', 'digits:6'],
            'otp_token' => ['required', 'string'],
        ]);

        // Require OTP verification to match the phone being submitted
        if (session('otp_verified_phone') !== $phone) {
            return back()
                ->withErrors(['phone' => 'Please verify your phone number via OTP before registering.'])
                ->withInput();
        }

        // OTP passed → cleanup session flag so it can't be reused
        session()->forget('otp_verified_phone');

        // Build only the columns that belong to marketplace_sellers
        $data = [
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'phone'  => $validated['phone'],
            'url'       => $validated['url'],
            'password'  => $validated['password'], // ensure the repository hashes this or use Hash::make() here if needed
            'is_approved' => ! core()->getConfigData('marketplace.settings.seller.approval_required'),
        ];

        $this->sellerRepository->create($data);

        return to_route('seller.session.index')
            ->withSuccess(trans('marketplace::app.seller.signup.success'));
    }
}
