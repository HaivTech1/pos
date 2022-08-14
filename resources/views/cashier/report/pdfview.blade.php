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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Daily Transactions For {{ Date('d-m-Y') }}</h4>
                        <div class="mb-4">
                            <img src="assets/images/logo-dark.png" alt="logo" height="20" />
                        </div>
                    </div>
                    <hr>
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 fw-bold">Order summary</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Item</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Skote - Admin Dashboard Template</td>
                                    <td class="text-end">$499.00</td>
                                </tr>

                                <tr>
                                    <td>02</td>
                                    <td>Skote - Landing Template</td>
                                    <td class="text-end">$399.00</td>
                                </tr>

                                <tr>
                                    <td>03</td>
                                    <td>Veltrix - Admin Dashboard Template</td>
                                    <td class="text-end">$499.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end">Sub Total</td>
                                    <td class="text-end">$1397.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Shipping</strong>
                                    </td>
                                    <td class="border-0 text-end">$13.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="border-0 text-end">
                                        <h4 class="m-0">$1410.00</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i
                                    class="fa fa-print"></i></a>
                            <a href="{{ route('order.pdfview',['download'=>'pdf']) }}"
                                class="btn btn-primary w-md waves-effect waves-light">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>