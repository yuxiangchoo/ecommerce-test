<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.index.title')
    </x-slot:title>

    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="seller-data-transfer" />
    @endsection

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <h2 class="text-2xl font-medium">
            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.index.title')
        </h2>
        
        <div class="flex items-center gap-x-2.5">
            <a
                href="{{ route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.create') }}"
                class="primary-button px-5 py-2.5"
            >
                @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.index.button-title')
            </a>
        </div>
    </div>

    <x-shop::datagrid
        :src="route('shop.mp_data_transfer.seller.account.seller_data_transfer.index')"
        :isMultiRow=true
    />
    
</x-marketplace::seller.layouts>