<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.title')
    </x-slot>

    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="seller-data-transfer" />
    @endSection

    {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.before') !!}

    <x-shop::form
        :action="route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.update', $import->id)"
        method="PUT"
        enctype="multipart/form-data"
    >
        {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.create_form_controls.before') !!}

        <!-- Page Header -->
        <div class="flex items-center justify-between gap-[16px] max-sm:flex-wrap">
            <p class="text-[26px] font-medium">
                @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.title')
            </p>

            <div class="flex items-center gap-x-[10px]">
                <a
                    href="{{ route('shop.mp_data_transfer.seller.account.seller_data_transfer.index') }}"
                    class="secondary-button px-5 py-2.5"
                >
                    @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.back-btn')
                </a>

                <button
                    class="primary-button px-5 py-2.5"
                >
                    @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.save-btn')
                </button>
            </div>
        </div>

        <!-- Body Content -->
        <div class="mt-[14px] flex gap-[25px] max-xl:flex-wrap">
            <!-- Left Container -->
            <div class="auto flex flex-1 flex-col gap-[8px] max-xl:flex">
                {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.card.general.before') !!}

                <!-- Setup Import Panel -->
                <div class="box-shadow rounded-[12px] border border-[#E9E9E9] bg-white p-[16px]">
                    <p class="text-[22px] font-medium leading-[33px] text-[#060C3B]">
                        @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.general')
                    </p>

                    <!-- Type -->
                    <x-shop::form.control-group class="mb-[10px] w-full">
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.type')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="select"
                            name="type"
                            id="type"
                            :value="old('type') ?? $import->type"
                            ref="importType"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.type')"
                        >
                            @foreach (config('seller_importers') as $code => $importer)
                                @if(
                                    $code != 'products' 
                                    && $code != 'categories' 
                                )
                                    <option value="{{ $code }}">@lang($importer['title'])</option>
                                @endif
                            @endforeach
                        </x-shop::form.control-group.control>

                        <!-- Source Sample Download Links -->
                        <a
                            :href="'{{ route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_sample') }}/' + $refs['importType']?.value"
                            target="_blank"
                            id="source-sample-link"
                            class="mt-1 cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                        >
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.download-sample')
                        </a>

                        <x-shop::form.control-group.error control-name="type" />
                    </x-shop::form.control-group>

                    <!-- File -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.file')
                        </x-shop::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="file"
                            name="file"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.file')"
                        />

                        <x-shop::form.control-group.error control-name="file" />
                    </x-shop::form.control-group>

                    <!-- Images Directory Path -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label>
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.images-directory')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="images_directory_path"
                            :value="old('images_directory_path') ?? $import->images_directory_path"
                            :placeholder="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.images-directory')"
                        />

                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-300">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.file-info')
                        </p>

                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-300">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.file-info-example')
                        </p>
                    </x-shop::form.control-group>

                     <!-- Image Zip Upload -->
                    <x-shop::form.control-group class="!mb-0" v-if="$refs['importType']?.value === 'seller_products' || $refs['importType']?.value === 'products'">
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.create.upload_images')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="file"
                            name="upload_images"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.create.upload_images')"
                        />
                        <!-- Sample images zip link -->
                        <a
                            :href="'{{ route('shop.mp_data_transfer.seller.account.seller_data_transfer.imports.download_sample_zip') }}'"
                            target="_blank"
                            id="source-sample-link"
                            class="mt-1 cursor-pointer text-sm text-blue-600 transition-all hover:underline"
                        >
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.create.download-sample-zip')
                        </a>

                        <x-shop::form.control-group.error control-name="upload_images" />
                    </x-shop::form.control-group>
                </div>

                {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.card.general.after') !!}
            </div>

            <!-- Right Container -->
            <div class="flex w-[360px] max-w-full flex-col gap-[8px]">
                {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.card.accordion.settings.before') !!}

                <!-- Settings Panel -->
                <div class="box-shadow rounded-[12px] border border-[#E9E9E9] bg-white p-[16px]">
                    <h3 class="text-[22px] font-medium leading-[33px] text-[#060C3B]">
                        @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.settings')
                    </h3>
            
                    <x-shop::form.control-group class="mb-[10px]">
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.action')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="select"
                            name="action"
                            id="action"
                            :value="old('action') ?? $import->action"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.action')"
                        >
                            <option value="append">@lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.create-update')</option>

                            <option value="delete">@lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.delete')</option>
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error control-name="action" />
                    </x-shop::form.control-group>

                    <!-- Validation Strategy -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.validation-strategy')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="select"
                            name="validation_strategy"
                            id="validation_strategy"
                            :value="old('validation_strategy') ?? $import->validation_strategy"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.validation-strategy')"
                        >
                            <option value="stop-on-errors">@lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.stop-on-errors')</option>

                            <option value="skip-erros">@lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.skip-errors')</option>
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error control-name="validation_strategy" />
                    </x-shop::form.control-group>

                    <!-- Allowed Errors -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.allowed-errors')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="allowed_errors"
                            :value="old('allowed_errors') ?? $import->allowed_errors"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.allowed-errors')"
                            :placeholder="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.allowed-errors')"
                        />

                        <x-shop::form.control-group.error control-name="allowed_errors" />
                    </x-shop::form.control-group>

                    <!-- CSV Field Separator -->
                    <x-shop::form.control-group>
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.field-separator')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="field_separator"
                            :value="old('field_separator') ?? $import->field_separator"
                            rules="required"
                            :label="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.field-separator')"
                            :placeholder="trans('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.field-separator')"
                        />

                        <x-shop::form.control-group.error control-name="field_separator" />
                    </x-shop::form.control-group>

                    <!-- Process In Queue -->
                    <x-shop::form.control-group class="!mb-0">
                        <x-shop::form.control-group.label class="required">
                            @lang('mp_data_transfer::app.shop.sellers.account.seller-data-transfer.imports.edit.process-in-queue')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="switch"
                            name="process_in_queue"
                            :value="1"
                            :checked="(boolean) $import->process_in_queue"
                        />

                        <x-shop::form.control-group.error control-name="process_in_queue" />
                    </x-shop::form.control-group>                
                </div>

                {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.card.accordion.settings.after') !!}
            </div>
        </div>

        {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.create_form_controls.after') !!}

    </x-shop::form>

    {!! view_render_event('bagisto.shop.sellers.account.seller-data_transfer.edit.after') !!}
    
</x-marketplace::seller.layouts>