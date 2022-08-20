<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Messaging</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Email Messaging</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Basic Information</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <form id="send-mail-form" role="form" method="post" action="{{route('messaging.sendMail')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <x-form.input type="email" id="inputEmail" name="to[]" class="block w-full mt-1" />
                                    <select class="form-control" name="category">
                                        <option>Select</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id() }}">{{ $user->firs }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <x-form.label for="title" value="{{ __('Product Name') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title"
                                        id="title" placeholder="Product Name" :value="old('title')" autofocus />
                                    <x-form.error for="title" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <x-form.label for="title" value="{{ __('Product Name') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title"
                                        id="title" placeholder="Product Name" :value="old('title')" autofocus />
                                    <x-form.error for="title" />
                                </div>
                            </div>
                        </div>
                </div>

                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary block waves-effect waves-light pull-right">Send
                        Message</button>
                </div>
                </form>

            </div>
        </div>

    </div>
    </div>

</x-app-layout>