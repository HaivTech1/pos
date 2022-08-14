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
                                    @if(!$cashierView)
                                    @include('cashier.manual')
                                    @else
                                    @include('cashier.barcode')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex justify-content-center">
                                            <div class="btn-group btn-group-example mb-3" role="group">
                                                <button type="button" onclick="PrintReceiptContent('print')"
                                                    class="btn btn-outline-primary w-sm">Receipt</button>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalScrollable"
                                                    class="btn btn-outline-primary w-sm">History</button>
                                                <button type="button"
                                                    class="btn btn-outline-primary w-sm">Report</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-primary text-white visa-card mb-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div>
                                                    <i class="bx bxl-visa visa-pattern"></i>

                                                    <div class="float-end">
                                                        <span class="display-5">{{ application('symbol') }} {{
                                                            $productIncart->sum('price') }}</span>
                                                    </div>

                                                    <div>
                                                        <i class="bx bx-chip h1 text-warning"></i>
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <h5 class="text-white float-end mb-0">{{
                                                        Date(config('panel.date_format'))
                                                        }}</h5>
                                                    <h5 class="text-white mb-0">{{ auth()->user()->name() }}</h5>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <x-form.input type='text' placeholder="Customer Name"
                                                        wire:model.debounce.500ms="c_name" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <x-form.input type='text' placeholder="Customer Number"
                                                        wire:model.debounce.500ms="c_number" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Order Summary</h4>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Grand Total :</td>
                                                    <td>$ 1,857</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount : </td>
                                                    <td>- $ 157</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge :</td>
                                                    <td>$ 25</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimated Tax : </td>
                                                    <td>$ 19.22</td>
                                                </tr>
                                                <tr>
                                                    <th>Total :</th>
                                                    <th>$ 1744.22</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">ORDER HISTORY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                    eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                    laoreet rutrum faucibus dolor auctor.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>