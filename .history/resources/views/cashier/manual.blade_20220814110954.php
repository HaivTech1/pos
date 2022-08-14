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
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> {{ session('error') }}
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-bullseye-arrow me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>