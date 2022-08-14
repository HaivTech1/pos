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
                    <option value=''>category</option>
                    @foreach ($categories as $category)
                    <option value="{{  $category->id() }}">{{ $category->name() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <x-form.input style='width: 50px' class="text-center" type='number' name='ca3[]' placeholder="Search..."
                    wire:model="searchProduct" autofocus />
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