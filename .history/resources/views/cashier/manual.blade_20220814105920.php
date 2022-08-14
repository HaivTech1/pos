<div class="card-body">
    <div class="card-header">
        <h4>
            MANUALLY SCANNING
        </h4>
    </div>

    <div class="my-2">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="my-select" class="ml-1">Category</label>
                    <select id="my-select" class="custom-select" wire:model="searchcategoryProduct">
                        @foreach ($categorys as $id => $category)
                        <option value="{{ $id }}"> {{ $category }}</option>
                        @endforeach
                    </select>
                    <input type="hidden"
                        class="form-control form-control-navbar rounded-full text-red-600 border-solid border border-red-300 p-2 w-full"
                        placeholder="Search..." wire:model="searchcategoryProduct">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="my-input" class="ml-2">Search</label>
                    <input type="text"
                        class="form-control form-control-navbar rounded-full text-red-600 border-solid border border-red-300 p-2 w-full"
                        placeholder="Search..." wire:model="searchProduct">
                </div>
            </div>
        </div>
    </div>
</div>