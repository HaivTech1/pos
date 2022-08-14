<div>
    <x-loading />
    <x-jet-form-section submit="updateApplicationInformation">

        <x-slot name="title">
            {{ __('Application Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your application\'s information.') }}
        </x-slot>

        <x-slot name="form">
            <div class="row">
                <!-- Site Name -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="name" value="{{ __('Name') }}" />
                    <x-form.input id="name" type="text" class="block w-full mt-1" wire:model.defer="app.name"
                        autocomplete="name" />
                    <x-form.error for="name" class="mt-2" />
                </div>

                <!-- Site Alias -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="alias" value="{{ __('Alias') }}" />
                    <x-form.input id="alias" type="text" class="block w-full mt-1" wire:model.defer="app.alias"
                        autocomplete="alias" />
                    <x-form.error for="alias" class="mt-2" />
                </div>

                <div class="col-md-3 mb-3">
                    <x-form.label for="fax" value="{{ __('Fax') }}" />
                    <x-form.input id="fax" type="number" class="block w-full mt-1" wire:model.defer="app.fax"
                        autocomplete="fax" />
                    <x-form.error for="fax" class="mt-2" />
                </div>

                <div class="col-md-3 mb-3">
                    <x-form.label for="tax" value="{{ __('tax') }}" />
                    <x-form.input id="tax" type="number" class="block w-full mt-1" wire:model.defer="app.tax"
                        autocomplete="tax" />
                    <x-form.error for="tax" class="mt-2" />
                </div>

                <div class="col-md-3 mb-3">
                    <x-form.label for="section" value="{{ __('section') }}" />
                    <x-form.input id="section" type="number" class="block w-full mt-1" wire:model.defer="app.section"
                        autocomplete="section" />
                    <x-form.error for="section" class="mt-2" />
                </div>

                <!-- Site Email -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="email" value="{{ __('Email') }}" />
                    <x-form.input id="email" type="email" class="block w-full mt-1" wire:model.defer="app.email" />
                    <x-form.error for="email" class="mt-2" />
                </div>
                <!-- Site line 1 -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="line1" value="{{ __('Mobile Number 1') }}" />
                    <x-form.input id="line1" type="text" class="block w-full mt-1" wire:model.defer="app.line1"
                        autocomplete="line1" />
                    <x-form.error for="line1" class="mt-2" />
                </div>
                <!-- Site line2 -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="line2" value="{{ __('Mobile Line 2') }}" />
                    <x-form.input id="line2" type="text" class="block w-full mt-1" wire:model.defer="app.line2"
                        autocomplete="line2" />
                    <x-form.error for="line2" class="mt-2" />
                </div>
                <!-- Site slogan -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="slogan" value="{{ __('Slogan') }}" />
                    <x-form.input id="slogan" type="text" class="block w-full mt-1" wire:model.defer="app.slogan"
                        autocomplete="slogan" />
                    <x-form.error for="slogan" class="mt-2" />
                </div>

                <!-- Site motto -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="motto" value="{{ __('Motto') }}" />
                    <x-form.input id="motto" type="text" class="block w-full mt-1" wire:model.defer="app.motto"
                        autocomplete="motto" />
                    <x-form.error for="motto" class="mt-2" />
                </div>

                <!-- Site address -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="address" value="{{ __('Address') }}" />
                    <x-form.input id="address" type="text" class="block w-full mt-1" wire:model.defer="app.address"
                        autocomplete="address" />
                    <x-form.error for="address" class="mt-2" />
                </div>

                <!-- Site currency -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="currency" value="{{ __('Currency') }}" />
                    <x-form.input id="currency" type="text" class="block w-full mt-1" wire:model.defer="app.currency"
                        autocomplete="currency" />
                    <x-form.error for="currency" class="mt-2" />
                </div>

                <!-- Site country -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="country" value="{{ __('Country') }}" />
                    <x-form.input id="country" type="text" class="block w-full mt-1" wire:model.defer="app.country"
                        autocomplete="country" />
                    <x-form.error for="country" class="mt-2" />
                </div>

                <!-- Site symbol -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="symbol" value="{{ __('Symbol') }}" />
                    <x-form.input id="symbol" type="text" class="block w-full mt-1" wire:model.defer="app.symbol"
                        autocomplete="symbol" />
                    <x-form.error for="symbol" class="mt-2" />
                </div>

                <!-- Site decimal_number -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="decimal_number" value="{{ __('Decimal Number') }}" />
                    <x-form.input id="decimal_number" type="text" class="block w-full mt-1"
                        wire:model.defer="app.decimal_number" autocomplete="decimal_number" />
                    <x-form.error for="decimal_number" class="mt-2" />
                </div>

                <!-- Site transac_report_alias -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="transac_report_alias" value="{{ __('Transaction Report Alias') }}" />
                    <x-form.input id="transac_report_alias" type="text" class="block w-full mt-1"
                        wire:model.defer="app.transac_report_alias" autocomplete="transac_report_alias" />
                    <x-form.error for="transac_report_alias" class="mt-2" />
                </div>

                <!-- Site order_invoice_alias -->
                <div class="col-md-3 mb-3">
                    <x-form.label for="order_invoice_alias" value="{{ __('Order Invoice Alias') }}" />
                    <x-form.input id="order_invoice_alias" type="text" class="block w-full mt-1"
                        wire:model.defer="app.order_invoice_alias" autocomplete="order_invoice_alias" />
                    <x-form.error for="order_invoice_alias" class="mt-2" />
                </div>

                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- cashier_setting --}}
                        <div class="mt-3">
                            <x-form.label for="cashier_setting" value="{{ __('Cashier Settings') }}" /><br />
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-bold font-semibold text-primary uppercase mr-2">Barcode</span>
                                <input type="checkbox" id="switch1" switch="none" checked value="1"
                                    name="cashier_setting" />
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                <span class="text-bold font-semibold text-primary uppercase ml-2">Search</span>
                            </div>
                            <x-form.error for="cashier_setting" />
                        </div>

                        {{-- product_preview --}}
                        <div class="d-flex justify-content-center align-items-center mt-3">

                            <input type="checkbox" id="switch1" switch="none" checked value="1"
                                name="product_preview" />
                            <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            <span class="text-bold font-semibold text-primary uppercase">Product View
                                Settings</span>
                            <x-form.error for="product_preview" />
                        </div>
                    </div>
                </div>
                <!-- Site description -->
                <div class="col-sm-12">

                    <div class="mb-3">
                        <x-form.label for="Postdesc" value="{{ __('Description') }}" />
                        <textarea class="form-control" id="Postdesc" rows="5" wire:model.defer="app.description"
                            value="old('description')" placeholder="Post Description"></textarea>
                    </div>

                </div>
            </div>
        </x-slot>

        <div class="col-sm-12">
            <x-slot name="actions" class="float-right">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <button class="btn btn-primary block waves-effect waves-light pull-right" wire:loading.attr="disabled"
                    wire:target="photo">
                    {{ __('Update Settings') }}
                </button>
            </x-slot>
        </div>
    </x-jet-form-section>
</div>