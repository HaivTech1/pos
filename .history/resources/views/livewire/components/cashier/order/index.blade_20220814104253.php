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
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex justify-content-around">
                                            <span class="mr-2 pr-4">Manually Scanning</span>
                                            <div>
                                                <livewire:components.toggle-button :model='$application'
                                                    field='cashier_setting' :key='$application->id()' />
                                            </div>
                                            <span>Barcode Scanning</span>
                                        </div>
                                    </div>
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