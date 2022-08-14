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
                    <th style="width: 20px;" class="align-middle">
                        <div class="form-check font-size-16">
                            <input class="form-check-input" type="checkbox" id="checkAll" wire:model="selectPageRows">
                            <label class="form-check-label" for="checkAll"></label>
                        </div>
                    </th>
                    <th class="align-middle">Post ID</th>
                    <th class="align-middle">Post Name</th>
                    <th class="align-middle">Post Status</th>
                    <th class="align-middle">Verification Status</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="javascript: void(0);" class="text-body fw-bold">{{ $post->id() }}</a>
                    </td>
                    <td>
                        <a href="javascript: void(0);" class="text-body fw-bold">{{ $post->title() }}</a>
                    </td>
                    <td>

                        @if ($post->available_badge == 'Not Available' )
                        <span class="badge badge-pill badge-soft-danger font-size-12">
                            {{ $post->available_badge }}</span>
                        @else
                        <span class="badge badge-pill badge-soft-success font-size-12">
                            {{ $post->available_badge }}</span>
                        @endif

                    </td>
                    <td>

                        @if ($post->verify_badge === 'Pending' )
                        <span class="badge badge-pill badge-soft-danger font-size-12">
                            {{ $post->verify_badge }}</span>
                        @else
                        <span class="badge badge-pill badge-soft-success font-size-12">
                            {{ $post->verify_badge }}</span>
                        @endif

                    </td>
                    <td>
                        <livewire:components.general-action :model="$post" :wire:key="$post->id()" />
                        <a class="dropdown-item" href="{{ route('post.show', $post) }}"><i class="fa fa-eye"></i></a>
                        <a class="dropdown-item" href="{{ route('post.edit', $post) }}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>