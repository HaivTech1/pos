<div class="card-body">
    <div class="card-header">
        <h4>
            MANUALLY SCANNING
        </h4>
    </div>

    <div class="my-2">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <div class="col-sm-6">
                        <select class="form-control select2" wire:model="category_id">
                            <option value=''>category</option>
                            @foreach ($categoriess as $category)
                            <option value="{{  $category->id() }}">{{ $category->title() }}</option>
                            @endforeach
                        </select>
                    </div>
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