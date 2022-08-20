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
                    <div class="panel rounded-top">
                        <div class="panel-heading bg-dark">
                            <div class="col-xs-6">
                                <h3 class="panel-title text-right">{{date("Y")}} Monthly Attendance</h3>
                            </div>
                            <div class="col-xs-6 panel-title">
                                <div class="col-xs-4 small" style="background-color:#8c0e0e">Men</div>
                                <div class="col-xs-4 small bg-success">Women</div>
                                <div class="col-xs-4 small bg-warning">Children</div>
                            </div>
                        </div>
                        <div class="pad-all" style="background-color: #e8ddd3;">
                            <div id="demo-morris-bar-month" class="legendInline" style="height:250px"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>