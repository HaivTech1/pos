<div>
    <x-loading />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    @if($setting->cashier_setting == 2)
                                    <button wire:click.prevent="switchBarcode({{ $setting->id }})"
                                        class="px-4 py-1 text-lg font-semibold border rounded-full text-gray-50 border-white-200 hover:text-red-600 hover:bg-gray-50 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                                        SWITCH TO BARCODE SCANNING
                                    </button>
                                    @else
                                    <button wire:click.prevent="switchManual({{ $setting->id }})"
                                        class="px-4 py-1 text-lg font-semibold border rounded-full text-gray-50 border-white-200 hover:text-red-600 hover:bg-gray-50 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                                        SWITCH TO MANUAL SCANNING
                                    </button>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Title</h4>
                                    <p class="card-text">Text</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Title</h4>
                                    <p class="card-text">Text</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>