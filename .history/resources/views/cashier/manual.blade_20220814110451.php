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
                <x-form.input class="text-center" type='number' name='ca3[]' placeholder="Search..."
                    wire:model="searchProduct" autofocus />
            </div>
        </div>
    </div>
</div>