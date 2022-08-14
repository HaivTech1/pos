<div class="card-body">
    <div class="card-header">
        <h4>
            MANUALLY SCANNING
        </h4>
    </div>

    <div class="my-2">
        <div class="row">
            <div class="col-sm-6">
                <select class="form-control select2" wire:model="category">
                    <option value=''>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{  $category->id() }}">{{ $category->name() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <x-form.input type='text' placeholder="Search..." wire:model="search" autofocus />
            </div>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="mdi mdi-bullseye-arrow me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="mdi mdi-bullseye-arrow me-2"></i>
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-error alert-dismissible fade show" role="alert">
        <i class="mdi mdi-bullseye-arrow me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle table-nowrap table-check">
            <thead class="table-light">
                <tr>
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
                        <input type="text" class="form-control text-red-600 font-medium"
                            value="{{ $cart->product->product_name}}">
                    </td>
                    <td width="15%">
                        <div class="row">
                            <div class="col-md-2">
                                <button wire:click.prevent="DecrementQty({{ $cart->id }})" class="btn-sm btn-danger"> -
                                </button>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="text-sm font-medium text-red-600 pl-2">{{
                                    $cart->product_qty}}</label>
                            </div>

                            <div class="col-md-2">
                                <button wire:click.prevent="IncrementQty({{ $cart->id }})" class="btn-sm btn-success"> +
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control price text-red-600 font-medium"
                            value="{{ $cart->product->price }}">
                    </td>
                    <td>
                        <input type="number" class="form-control discount text-red-600 font-medium"
                            value="{{ $cart->discount }}">
                    </td>
                    <td>
                        <input type="number" class="form-control total_amount text-red-600 font-medium"
                            value="{{ $cart->product_qty * $cart->product->price }}">
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times"
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
            <div class="" data-aos="fade-up">

                @foreach ($productIncart as $item)
                @if ( $item->product->id == $product->id())
                <i class="btn rounded-full fa fa-check-circle text-danger"></i>
                @endif
                @endforeach

                <button wire:click.prevent="InsertManualToCart({{ $product->id() }})">
                    <div class="">
                        @foreach($product->image() as $index => $image)
                        <img width="150" height="150" src="{{ asset('storage/products/'.$image)}}" class="img-fluid "
                            alt="{{ $product->title() }}">
                        @endforeach
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-red-600">{{ $product->title() }}</h4>
                        <p class="card-text"> {{ application('symbol') }} {{ number_format($product->price(),
                            application('decimal_number') ) }}</p>
                    </div>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>