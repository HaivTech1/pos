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
                                    <?php if(isset($_GET['mail'])) { ?>
                                    <x-form.input type="email" id="inputEmail" name="to[]" class="block w-full mt-1" />
                                    <?php echo '</div>'; }else{ ?>
                                    <select class="form-control" name="category">
                                        <option>Select</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id() }}">{{ $user->name() }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <x-form.input id="emails" type="text"
                                            placeholder="Type in comma seperated emails and click add"
                                            class="form-control" aria-label="Recipient's email"
                                            aria-describedby="basic-addon2" />
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary block waves-effect waves-light pull-right">
                                            Add</button>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <x-form.label>Subject</x-form.label>
                                    <x-form.input type="text" id="inputSubject" name="subject" class="block w-full mt-1"
                                        required />
                                </div>

                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <x-form.input id="emails" type="text"
                                            placeholder="Type in comma seperated emails and click add"
                                            class="form-control" aria-label="Recipient's email"
                                            aria-describedby="basic-addon2" />
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary block waves-effect waves-light pull-right">
                                            Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>

</x-app-layout>