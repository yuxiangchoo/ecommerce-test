{{-- packages/Webkul/Sms/src/Resources/views/admin/test.blade.php --}}

<x-admin::layouts>
    <x-slot:title>
        {{ __('SMS Test') }}
    </x-slot:title>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.sms.test') }}">
            @csrf
            <div class="control-group">
                <label class="required">Send To (phone)</label>
                <input type="text" name="to" value="{{ old('to') }}" class="control" required>
                @error('to') <span class="control-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-lg btn-primary mt-2">Send Test SMS</button>
        </form>
    </div>
</x-admin::layouts>
