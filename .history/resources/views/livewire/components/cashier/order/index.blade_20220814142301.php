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
                                    <div class="btn-group btn-group-example mb-3" role="group">
                                        <button type="button" class="btn btn-outline-primary w-sm">Receipt</button>
                                        <button type="button" class="btn btn-outline-primary w-sm">History</button>
                                        <button type="button" class="btn btn-outline-primary w-sm">Report</button>
                                    </div>
                                    <div class="card bg-primary text-white visa-card mb-0">
                                        <div class="card-body">
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

                                            <div class="row mt-5">
                                                <div class="col-4">
                                                    <p>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <p>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <p>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                        <i class="fas fa-star-of-life m-1"></i>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <h5 class="text-white float-end mb-0">{{
                                                    Date(config('panel.date_format'))
                                                    }}</h5>
                                                <h5 class="text-white mb-0">{{ auth()->user()->name() }}</h5>
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