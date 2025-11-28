<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900" v-if="['products', 'categories', 'seller_products', 'seller_categories'].includes($refs['importType']?.value)">
    <!-- Image Zip Upload -->
    <x-admin::form.control-group>
        <x-admin::form.control-group.label class="required">
            @lang('mp_data_transfer::app.admin.data-transfer.imports.create.upload_images')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="file"
            name="upload_images"
            :label="trans('mp_data_transfer::app.admin.data-transfer.imports.create.upload_images')"
        />
        
        <!-- Sample images zip link -->
        <a
            :href="'{{ route('admin.settings.data_transfer.imports.download_sample_zip') }}/' + $refs['importType']?.value"
            target="_blank"
            id="source-sample-link"
            class="mt-1 cursor-pointer text-sm text-blue-600 transition-all hover:underline"
        >
            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.create.download-sample-zip')
        </a>
        
        <x-admin::form.control-group.error control-name="upload_images" />
    </x-admin::form.control-group>
</div>

<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900" v-if="['seller_products', 'seller_categories'].includes($refs['importType']?.value)" >
    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
        @lang('mp_data_transfer::app.admin.data-transfer.imports.create.marketplace')
    </p>
    <!-- Set Seller -->
    <x-admin::form.control-group>
        <x-admin::form.control-group.label class="required">
            @lang('mp_data_transfer::app.admin.data-transfer.imports.create.set_seller')
        </x-admin::form.control-group.label>

        @php
            $sellerRepo = app('Webkul\Marketplace\Repositories\SellerRepository');
            
            $sellers = app('Webkul\Marketplace\Repositories\SellerRepository')->all();
            
            $selectSellerId = request()->id ? app('Webkul\MpDataTransfer\Repositories\SellerImportsRepository')->findOneByField('import_id', request()->id)?->seller_id : null;
        @endphp
        
        <x-admin::form.control-group.control
            type="select"
            name="seller"
            id="seller"
            :value="old('seller') ?? $selectSellerId"
            ref="seller"
            rules="required"
            :label="trans('mp_data_transfer::app.admin.data-transfer.imports.create.set_seller')"
        >
            <option value="">
                @lang('mp_data_transfer::app.admin.data-transfer.imports.create.select_seller')
            </option>

            @foreach ($sellers as $seller)
                <option 
                    value="{{ $seller->id }}"
                >
                    {{ $seller->name }}
                </option>
            @endforeach
        </x-admin::form.control-group.control>
        <x-admin::form.control-group.error control-name="seller" />
    </x-admin::form.control-group>
</div>
