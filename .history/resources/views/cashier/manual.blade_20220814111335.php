<div class="card-body">
    <div class="card-header">
        <h4>
            MANUALLY SCANNING
        </h4>
    </div>

    <div class="my-2">
        <div class="row">
            <div class="col-sm-6">
                <select class="form-control select2" wire:model="category_id">
                    <option value=''>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{  $category->id() }}">{{ $category->name() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <x-form.input type='text' placeholder="Search..." wire:model="searchProduct" autofocus />
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

                    <th class="align-middle">Post ID</th>
                    <th class="align-middle">Product Name</th>
                    <th class="align-middle">Qty</th>
                    <th class="align-middle">Price</th>
                    <th class="align-middle">Dis (%)</th>
                    <th colspan="6">#</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Dis (%)</th>
                    <th colspan="6">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        gsdgs
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>