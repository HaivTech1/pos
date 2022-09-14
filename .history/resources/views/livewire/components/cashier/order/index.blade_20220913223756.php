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
                                    <div class="d-flex justify-content-between">
                                        <div class="row">
                                            <div class="d-flex justify-content-center">
                                                <div class="btn-group btn-group-example mb-3" role="group">
                                                    <button type="button" onclick="PrintReceiptContent('print')"
                                                        class="btn btn-outline-primary w-sm">
                                                        Print
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalScrollable"
                                                        class="btn btn-outline-primary w-sm">History</button>
                                                    <a href="{{ route('order.pdfview') }}"
                                                        class="btn btn-outline-primary w-sm">Report</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-check form-switch form-switch-lg mb-3">
                                                <input class=" form-check-input" wire:model="cashierView"
                                                    type="checkbox" role="switch" @if ($cashierView) checked @endif />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>
                                            @if (!$cashierView)
                                            Manual Searching
                                            @else
                                            Barcode Searching
                                            @endif

                                        </h4>
                                    </div>

                                    @if (!$cashierView)
                                    <div class="my-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control select2" wire:model="category">
                                                    <option value=''>Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{  $category->id() }}">{{ $category->name() }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <x-form.input type='search' placeholder="Search for product name..."
                                                    wire:model.debounce.500ms="search" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="my-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <x-form.input type='search' placeholder="Search..."
                                                    wire:model.debounce.500ms="product_code"
                                                    placeholder="Enter Product Code" autofocus />
                                            </div>
                                        </div>
                                    </div>
                                    @endif



                                    @if(session()->has('success'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @elseif(session()->has('info'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                                        {{ session('info') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @elseif(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th class="align-middle">Product Name</th>
                                                    <th class="align-middle">Qty</th>
                                                    <th class="align-middle">Price</th>
                                                    <th class="align-middle">Dis (%)</th>
                                                    <th colspan="6">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productIncart as $key => $cart)
                                                <tr>
                                                    <td class="no">{{ $key+1 }}</td>
                                                    <td width="30%">
                                                        <input type="text"
                                                            class="form-control text-red-600 font-medium text-center"
                                                            value="{{ $cart->product->title()}}" disabled>
                                                    </td>
                                                    <td width="15%">
                                                        <div class="row">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="col-md-2">
                                                                    <button
                                                                        wire:click.prevent="DecrementQty({{ $cart->id }})"
                                                                        class="btn-sm btn-danger"> -
                                                                    </button>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <label for=""
                                                                        class="text-sm font-medium text-red-600 pl-2">{{
                                                                        $cart->qty()}}</label>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <button
                                                                        wire:click.prevent="IncrementQty({{ $cart->id }})"
                                                                        class="btn-sm btn-success"> +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control price text-red-600 font-medium"
                                                            value="{{ $cart->product->price() }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control discount text-red-600 font-medium"
                                                            value="{{ $cart->discount }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control total_amount text-red-600 font-medium"
                                                            value="{{ $cart->qty() * $cart->product->price() }}"
                                                            disabled>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-danger rounded-circle"><i
                                                                class="fa fa-times"
                                                                wire:click="removeProduct({{ $cart->id}})"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                            <div class="">
                                                @foreach ($productIncart as $item)
                                                @if ( $item->product->id() == $product->id())
                                                <i class="btn rounded-full fa fa-check-circle text-danger"></i>
                                                @endif
                                                @endforeach

                                                <div wire:click="InsertToCart({{ $product }})" style="cursor: pointer">
                                                    <div>
                                                        <img width="70" height="70"
                                                            src="{{ asset('storage/products/'.$product->image()[0])}}"
                                                            class="img-fluid " alt="{{ $product->title() }}">
                                                    </div>

                                                    <div class="card-body">
                                                        <h4 class="card-title text-red-600">{{ $product->title() }}
                                                        </h4>
                                                        <p class="card-text">
                                                            {{ application('symbol') }} {{
                                                            number_format($product->price(),
                                                            application('decimal_number') ) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <form wire:submit.prevent="createOrder">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card bg-primary text-white visa-card mb-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div>
                                                            <i class="bx bxl-visa visa-pattern"></i>

                                                            <div class="float-end">
                                                                <span class="display-6">{{ application('symbol') }} {{
                                                                    $productIncart ?
                                                                    number_format($productIncart->sum('price',),
                                                                    application('decimal_number')) : 0
                                                                    }}</span>
                                                            </div>

                                                            <div>
                                                                <i class="bx bx-chip h1 text-warning"></i>
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <h5 class="text-white float-end mb-0">{{
                                                                Date(config('panel.time_format'))
                                                                }}</h5>
                                                            <h5 class="text-white mb-0">{{ auth()->user()->name() }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-sm-6">
                                                <x-form.input type='text' placeholder="Customer Name"
                                                    wire:model.defer="name" />
                                            </div>
                                            <div class="col-sm-6">
                                                <x-form.input type='number' placeholder="Customer Number"
                                                    wire:model.defer="phone" />
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <h6>Payment Method</h6>

                                            <div class="row mt-2">
                                                <select class="form-control select2" wire:model.defer="method">
                                                    <option value="">Choose Method</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="transfer">Transfer</option>
                                                    <option value="card">Card</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-sm-12">
                                                <x-form.label for="title" value="{{ __('Payment') }}"
                                                    class="text-center" />

                                                <x-form.input type='number' wire:model.debounce.500ms="pay_money" />
                                            </div>
                                            <div class="col-sm-12">
                                                <x-form.label for="title" value="{{ __('Remaining Change') }}" />

                                                <x-form.input type='number' wire:model.defer="balance" disabled />
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="d-grid gap-2">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg waves-effect waves-light">Submit</button>
                                                    <button type="button"
                                                        class="btn btn-secondary btn-lg waves-effect waves-light">Calculator</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                    <h5 class="modal-title" id="exampleModalScrollableTitle">LATEST ORDER HISTORY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Order Summary</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($histories as $history)
                                        <tr>
                                            <td>{{ $history->product->title() }}</td>
                                            <td>{{ $history->qty() }}</td>
                                            <td>{{ $history->unitprice() * $history->qty() }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>Total :</th>
                                            <th>{{ number_format($histories->sum('amount'), 2) }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>