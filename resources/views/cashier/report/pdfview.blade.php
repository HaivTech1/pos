<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Report</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Generate</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Daily Transactions</h4>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cashier's Name</th>
                                <th>Payment Method</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Transaction Amount</th>
                                <th>Orders</th>
                                <th>Customer's Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reports as $key => $report)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $report->author()->name() }}</td>
                                <td>{{ $report->method() }}</td>
                                <td>{{ $report->payment() }}</td>
                                <td>{{ $report->balance() }}</td>
                                <td>{{ $report->orderdetail->sum('amount') }}</td>
                                <td>{{ $report->orderdetail->count() }}</td>
                                <td>{{ $report->name() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</x-app-layout>