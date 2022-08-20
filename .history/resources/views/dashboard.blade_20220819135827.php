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
                                    <div class="col-sm-4">
                                        <h3 class="panel-title text-right">{{date("Y")}} Report</h3>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">Men</div>
                                            <div class="col-sm-4 bg-success">Women</div>
                                            <div class="col-sm-4 bg-warning">Children</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="pad-all" style="background-color: #e8ddd3;">
                                    <div id="demo-morris-bar-week" class="legendInline" style="height:250px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>