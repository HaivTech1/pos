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
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-switch form-switch-lg mb-3">
                                            <input class=" form-check-input" wire:model="cashierView" type="checkbox"
                                                role="switch" @if ($cashierView) checked @endif />

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @include('cashier.manual')

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