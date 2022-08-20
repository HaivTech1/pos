<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-xl-4">
            <x-card.details :order="$orders" />
        </div>

        <div class="col-xl-8">
            <livewire:components.dashboard />
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h3 class="panel-title text-right">{{date("Y")}} Last 10 Weeks Attendance</h3>

                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>