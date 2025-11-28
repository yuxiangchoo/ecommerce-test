<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('marketplace::app.seller.signup.page-title')"/>
    <meta name="keywords" content="@lang('marketplace::app.seller.signup.page-title')"/>
@endpush   

@push('styles')
<style>
    /* Make required field * red */
    label.required::after {
        content: " *";
        color: #ef4444; /* Tailwind red-500 */
        font-weight: 500;
    }
</style>
@endpush

<x-shop::layouts :has-header="false" :has-feature="false" :has-footer="false">
    <x-slot:title>@lang('marketplace::app.seller.signup.page-title')</x-slot>

    <div class="container mt-20 max-1180:px-5">
        {!! view_render_event('bagisto.seller.sign_up.logo.before') !!}

        <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
            <a href="{{ route('shop.home.index') }}" class="m-[0_auto_20px_auto]" aria-label="@lang('marketplace::app.seller.signup.bagisto')">
                <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" 
                     alt="{{ config('app.name') }}" width="131" height="29">
            </a>
        </div>

        {!! view_render_event('bagisto.seller.sign_up.logo.after') !!}

        <div class="m-auto w-full max-w-[870px] rounded-xl border p-16 px-[90px] max-md:px-8 max-md:py-8">
            <h1 class="font-dmserif text-4xl max-sm:text-2xl">
                @lang('marketplace::app.seller.signup.page-title')
            </h1>
            <p class="mt-4 text-xl text-[#6E6E6E] max-sm:text-base">
                @lang('marketplace::app.seller.signup.form-signup-text')
            </p>

            {!! view_render_event('bagisto.seller.sign_up.before') !!}

            <div class="mt-14 rounded max-sm:mt-8">
                <x-shop::form :action="route('seller.register.store')">
                    {!! view_render_event('bagisto.seller.sign_up.form_controls.before') !!}

                    {{-- === NAME === --}}
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.name')
                        </x-shop::form.control-group.label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               placeholder="@lang('marketplace::app.seller.signup.name')"
                               class="h-12 w-full px-4 text-sm border border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                        <x-shop::form.control-group.error control-name="name" />
                    </x-shop::form.control-group>

                    {{-- === SHOP URL === --}}
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.url')
                          <span class="ml-1 text-gray-400 cursor-help"
                                title="@lang('marketplace::app.seller.signup.url-tooltip')">
                              ⓘ
                          </span>
                        </x-shop::form.control-group.label>

                        <input type="text" name="url" value="{{ old('url') }}"
                              placeholder="@lang('marketplace::app.seller.signup.url')"
                              class="h-12 w-full px-4 text-sm border border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                        <x-shop::form.control-group.error control-name="url" />
                    </x-shop::form.control-group>

                    {{-- === EMAIL === --}}
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.email')
                        </x-shop::form.control-group.label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               placeholder="email@example.com"
                               class="h-12 w-full px-4 text-sm border border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                        <x-shop::form.control-group.error control-name="email" />
                    </x-shop::form.control-group>

                    {{-- === PHONE + SEND OTP === --}}
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.phone-number')
                        </x-shop::form.control-group.label>
                        <div class="flex w-full">
                            <span style="min-width:10%" class="inline-flex items-center px-4 h-12 border border-r-0 border-gray-300 bg-gray-50 text-gray-600 text-sm rounded-l-md">
                                +60
                            </span>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   placeholder="@lang('marketplace::app.seller.signup.phone-number')"
                                    style="min-width:50%" 
                                   class="flex-1 h-12 px-4 text-sm border-t border-b border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                            <button id="send-otp-btn" type="button"
                                    data-endpoint="{{ route('seller.register.otp.send') }}"
                                     style="min-width:20%" 
                                    class="h-12 px-5 text-sm font-medium border border-gray-300 bg-white text-navyBlue rounded-r-md hover:bg-gray-50">
                                @lang('marketplace::app.seller.signup.send-otp')
                            </button>
                        </div>
                        <div id="otp-send-help" class="text-sm mt-1"></div>
                        <x-shop::form.control-group.error control-name="phone" />
                    </x-shop::form.control-group>

                    {{-- === OTP + VERIFY === --}}
                    <x-shop::form.control-group class="mt-4">
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.otp')
                        </x-shop::form.control-group.label>
                        <div class="flex w-full">
                            <input type="text" name="otp_code" value="{{ old('otp_code') }}"
                                   placeholder="@lang('marketplace::app.seller.signup.otp')"
                                   style="min-width:70%" 
                                   class="flex-1 h-12 px-4 text-sm border border-r-0 border-gray-300 rounded-l-md focus:ring-navyBlue focus:border-navyBlue"/>
                            <button id="verify-otp-btn" type="button"
                                    data-endpoint="{{ route('seller.register.otp.verify') }}"
                                    style="min-width:20%" 
                                    class="h-12 px-5 text-sm font-medium border border-gray-300 bg-white text-navyBlue rounded-r-md hover:bg-gray-50">
                                @lang('marketplace::app.seller.signup.verify-otp')
                            </button>
                        </div>
                        <input type="hidden" name="otp_token" id="otp_token" value="{{ old('otp_token') }}"/>
                        <div id="otp-verify-help" class="text-sm mt-1"></div>
                        <x-shop::form.control-group.error control-name="otp_code" />
                    </x-shop::form.control-group>

                    {{-- === PASSWORD === --}}
                    <x-shop::form.control-group class="mb-6">
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.password')
                        </x-shop::form.control-group.label>
                        <input type="password" name="password" value="{{ old('password') }}"
                               placeholder="@lang('marketplace::app.seller.signup.password')"
                               class="h-12 w-full px-4 text-sm border border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                        <x-shop::form.control-group.error control-name="password" />
                    </x-shop::form.control-group>

                    {{-- === CONFIRM PASSWORD === --}}
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('marketplace::app.seller.signup.confirm-pass')
                        </x-shop::form.control-group.label>
                        <input type="password" name="password_confirmation"
                               placeholder="@lang('marketplace::app.seller.signup.confirm-pass')"
                               class="h-12 w-full px-4 text-sm border border-gray-300 focus:ring-navyBlue focus:border-navyBlue"/>
                        <x-shop::form.control-group.error control-name="password_confirmation" />
                    </x-shop::form.control-group>

                    {{-- CAPTCHA --}}
                    @if (core()->getConfigData('customer.captcha.credentials.status'))
                        <div class="mb-5 flex">{!! \Webkul\Customer\Facades\Captcha::render() !!}</div>
                    @endif

                    {{-- SUBMIT --}}
                    <div class="mt-8 flex">
                        <button class="primary-button m-0 block w-full max-w-[374px] rounded-2xl px-11 py-4 text-center text-base" type="submit">
                            @lang('marketplace::app.seller.signup.button-title')
                        </button>
                    </div>

                    {!! view_render_event('bagisto.seller.sign_up.form_controls.after') !!}
                </x-shop::form>
            </div>

            {!! view_render_event('bagisto.seller.sign_up.after') !!}

            <p class="mt-5 font-medium text-[#6E6E6E]">
                @lang('marketplace::app.seller.signup.account-exists')
                <a class="text-navyBlue" href="{{ route('seller.session.index') }}">
                    @lang('marketplace::app.seller.signup.sign-in-button')
                </a>
                {!! view_render_event('bagisto.seller.sign_up.sign_in_btn.after') !!}
            </p>
        </div>

        <p class="mb-4 mt-8 text-center text-xs text-[#6E6E6E]">
            @lang('marketplace::app.seller.signup.footer', ['current_year' => date('Y') ])
        </p>
    </div>

@push('scripts')
{!! \Webkul\Customer\Facades\Captcha::renderJS() !!}
<script>
(function () {
  function ui(el, msg, ok) {
    if (!el) return;
    el.textContent = msg || '';
    el.className = 'text-sm mt-1 ' + (ok ? 'text-green-600' : 'text-red-600');
  }
  function $(s) { return document.querySelector(s); }
  function csrf() {
    const m = document.querySelector('meta[name="csrf-token"]');
    return m ? m.getAttribute('content') : '{{ csrf_token() }}';
  }
  async function postJSON(url, payload) {
    const res = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrf(),
      },
      credentials: 'same-origin',
      body: JSON.stringify(payload),
    });
    let data = {};
    try { data = await res.json(); } catch {}
    return { res, data };
  }
  function startCooldown(btn, seconds) {
    if (!btn) return;
    let left = seconds;
    const orig = btn.textContent;
    btn.disabled = true;
    const t = setInterval(() => {
      btn.textContent = `${orig} (${left})`;
      left--;
      if (left < 0) { clearInterval(t); btn.disabled = false; btn.textContent = orig; }
    }, 1000);
  }

  document.addEventListener('click', async (e) => {
    // ====== SEND OTP ======
    const sendBtn = e.target.closest('#send-otp-btn');
    if (sendBtn) {
      const phoneEl   = $('input[name="phone"]');
      const tokenEl   = $('#otp_token');
      const sendHelp  = $('#otp-send-help');

      const endpoint = sendBtn.dataset.endpoint;
      const phone    = (phoneEl?.value || '').trim();

      if (!endpoint) { ui(sendHelp, 'Missing endpoint.'); return; }
      if (!phone)    { ui(sendHelp, "@lang('marketplace::app.seller.signup.enter-phone-first')"); phoneEl?.focus(); return; }

      ui(sendHelp, 'Sending...', true);
      sendBtn.disabled = true;

      try {
        const { res, data } = await postJSON(endpoint, { phone });
        if (res.ok && data.token) {
          if (tokenEl) tokenEl.value = data.token;
          ui(sendHelp, "@lang('marketplace::app.seller.signup.otp-sent')", true);
          startCooldown(sendBtn, 60);
        } else {
          ui(sendHelp, data.message || "@lang('marketplace::app.seller.signup.otp-send-failed')");
          sendBtn.disabled = false;
        }
      } catch (err) {
        ui(sendHelp, "@lang('marketplace::app.seller.signup.network-error')");
        sendBtn.disabled = false;
      }
      return;
    }

    // ====== VERIFY OTP ======
    const verifyBtn = e.target.closest('#verify-otp-btn');
    if (verifyBtn) {
      const tokenEl    = $('#otp_token');
      const otpEl      = $('input[name="otp_code"]');
      const verifyHelp = $('#otp-verify-help');
      const endpoint   = verifyBtn.dataset.endpoint;

      const token = tokenEl?.value || '';
      const otp   = (otpEl?.value || '').trim();

      if (!endpoint) { ui(verifyHelp, 'Missing endpoint.'); return; }
      if (!token)    { ui(verifyHelp, "@lang('marketplace::app.seller.signup.send-otp-first')"); return; }
      if (!otp)      { ui(verifyHelp, "@lang('marketplace::app.seller.signup.enter-otp')"); otpEl?.focus(); return; }

      ui(verifyHelp, 'Verifying...', true);
      verifyBtn.disabled = true;
      try {
        const { res, data } = await postJSON(endpoint, { token, otp });
        ui(verifyHelp,
          (res.ok && data.status === 'verified')
            ? "@lang('marketplace::app.seller.signup.otp-verified')"
            : (data.message || "@lang('marketplace::app.seller.signup.otp-invalid')"),
          res.ok && data.status === 'verified'
        );
      } catch (err) {
        ui(verifyHelp, "@lang('marketplace::app.seller.signup.network-error')");
      } finally {
        verifyBtn.disabled = false;
      }
    }
  });
})();
</script>
@endpush
</x-shop::layouts>
