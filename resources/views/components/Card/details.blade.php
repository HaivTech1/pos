<div class="card overflow-hidden">
    <div class="bg-primary bg-soft">
        <div class="row">
            <div class="col-7">
                <div class="text-primary p-3">
                    <h5 class="text-primary">Welcome Back {{ auth()->user()->user_type }}!</h5>
                    <p>to {{ application('name')}}</p>
                </div>
            </div>
            <div class="col-5 align-self-end">
                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Daily Sales</h4>
            <div class="row">
                <div class="col-sm-6">
                    <p class="text-muted">Today</p>
                    <h3>{{ application('symbol') }} {{ $order->sum('amount') }}</h3>
                    <p class="text-muted"><span class="text-success me-2"> Total Orders: {{ $order->count() }}</p>
                </div>
                {{-- <div class="col-sm-6">
                    <div class="mt-4 mt-sm-0">
                        <div id="radialBar-chart" class="apex-charts"></div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>