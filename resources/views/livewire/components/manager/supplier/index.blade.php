<div>
    <x-loading />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-search />
                                </div>

                                <div class="col-lg-8">
                                    <div class="row">

                                        @if($selectedRows)
                                        <div class="col-6">
                                            <div class="btn-group btn-group-example mb-3" role="group">
                                                <button wire:click.prevent="deleteAll" type="button"
                                                    class="btn btn-outline-primary w-sm">
                                                    <i class="bx bx-block"></i>
                                                    Delete All
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </diV>
                            </div>
                        </div>
                    </div>

                    <div class='row'>

                        <div class='col-sm-8'>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        wire:model="selectPageRows">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle"> Title</th>
                                            <th class="align-middle"> Phone</th>
                                            <th class="align-middle"> Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($suppliers as $key => $supplier)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" value="{{ $supplier->id() }}"
                                                        type="checkbox" id="{{ $supplier->id() }}"
                                                        wire:model="selectedRows">
                                                    <label class="form-check-label" for="{{ $supplier->id() }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);" class="text-body fw-bold">{{ $key+1
                                                    }}</a>
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$supplier' field='title'
                                                    :key='$supplier->id()' />
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$supplier' field='phone'
                                                    :key='$supplier->id()' />
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$supplier' field='email'
                                                    :key='$supplier->id()' />
                                            </td>
                                            <td>
                                                <a href="{{route('messaging.email')}}?mail={{$supplier->email()}}">
                                                    <i class="mdi mdi-chat d-block font-size-16"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $suppliers->links('pagination::custom-pagination')}}
                        </div>
                        <div class='col-sm-4'>
                            <form id="createSupplier" role="form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-form.label for='title' value="{{ __('Name') }}" />
                                        <x-form.input id='title' class="block w-full mt-1" :value="old('title')"
                                            name='title' />
                                        <x-form.error for="title" />
                                    </div>

                                    <div class="col-sm-12">
                                        <x-form.label for='email' value="{{ __('Email') }}" />
                                        <x-form.input id='email' class="block w-full mt-1" :value="old('email')"
                                            name='email' />
                                        <x-form.error for="email" />
                                    </div>

                                    <div class="col-sm-12">
                                        <x-form.label for='address' value="{{ __('Address') }}" />
                                        <x-form.input id='address' class="block w-full mt-1" :value="old('address')"
                                            name='address' />
                                        <x-form.error for="address" />
                                    </div>

                                    <div class="col-sm-12">
                                        <x-form.label for='phone' value="{{ __('Phone') }}" />
                                        <x-form.input type="number" id='phone' class="block w-full mt-1"
                                            :value="old('phone')" name='phone' />
                                        <x-form.error for="phone" />
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <x-form.label for='brands' value="{{ __('Brands') }}" />
                                        <select name="brands[]" class="form-control select2-multiple" multiple>
                                            <option>Select classes</option>
                                            @foreach ($brands as $id => $brand)
                                            <option value="{{ $id }}">{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.error for="brands" />
                                    </div>
                                    <div class="col-sm-12 mt-2">
                                        <div class="pull-right">
                                            <button id="submit_button" type="submit"
                                                class="btn btn-primary waves-effect waves-light">
                                                Add
                                            </button>
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


    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#createSupplier').submit((e) => {
                toggleAble('#submit_button', true, 'Submitting...');
                e.preventDefault()
                var data = $('#createSupplier').serializeArray();
                var url = "{{ route('supplier.store') }}";

                console.log(data);

                $.ajax({
                    type: "POST", 
                    url, 
                    data
                }).done((res) => {
                    toggleAble('#submit_button', false);

                    Swal.fire({
                        title: "Success!",
                        text: res.message,
                        icon: "success",
                        confirmButtonColor: "#00ff00",
                    });
                    console.log(res.message);
                }).fail((res) => {
                    console.log(res.responseJSON.message);
                    Swal.fire({
                        title: "Oops!",
                        text: res.responseJSON.message,
                        icon: "error",
                        confirmButtonColor: "#ff0000",
                    });
                    toggleAble('#submit_button', false);
                });
            });
        });
    </script>
    @endsection
</div>