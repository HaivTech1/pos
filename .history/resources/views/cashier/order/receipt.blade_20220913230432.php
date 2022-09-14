<div id="invoice-POS">
    <div class="hero">
        <img src="/favicon.ico" alt="">
    </div>
    <div>
        {{-- prit section --}}
        <div class="d-print-none print_content">

            <center id="top">
                <div class="logo">
                    <img class="" src="{{ asset('storage/'.application('image'))}}" alt="{{ application('name') }}"
                        width="70" height="70">
                </div>
                <div class="info">
                    <h2>{{ application('name')}}</h2>
                    <address style="font-size: 8px">{{ application('address')}}</address>
                </div>
            </center>

            <div class="mid">
                <div class="info">
                    <address style="font-size: 8px">
                        {{ application('description')}} <br>
                        {{ application('email')}} <br>
                        {{ application('line1') }}, {{ application('line2') }}
                    </address>
                </div>
            </div>
        </div>

        <!-- end of receipt mid -->
        @if (count($order_receipt) >= 1)
            <div class="bot">
                <div class="table-responsive">
                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item">
                                    <h2>Item</h2>
                                </td>
                                <td class="Hours">
                                    <h2>QTY</h2>
                                </td>
                                <td class="Rate">
                                    <h2>Rate</h2>
                                </td>
                                <td class="Rate">
                                    <h2>Discount</h2>
                                </td>
                                <td style="text-align: center">
                                    <h5 style="text-align: center">{{ trans('global.naira') }} Total K</h5>
                                </td>
                            </tr>

                            @foreach ($order_receipt as $receipt)
                            <tr class=" service">
                                <td class="tableitem">
                                    <h5 class="itemtext">{{ $receipt->product->title()}}</h5>
                                </td>
                                <td class="tableitem">
                                    <h5 class="itemtext">{{ $receipt->qty()}}</h5>
                                </td>
                                <td class="tableitem">
                                    <h5 class="itemtext">{{ number_format($receipt->product->price(), 2)}}</h5>
                                </td>
                                <td class="tableitem">
                                    <h5 class="itemtext">{{ $receipt->discount() ? '' : '0'}}</h5>
                                </td>
                                <td class="tableitem">
                                    <h5 style="font-size: 7px">{{
                                        number_format($receipt->amount,2) }}
                                    </h5>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="tabletitle">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="Rate">
                                    <p class="itemtext">Tax</p>
                                </td>
                                <td class="Payment">
                                    <p class="itemtext"> {{ number_format(application('tax'), 2) }}</p>
                                </td>
                            </tr>
                            <tr class="tabletitle">
                                <td></td>
                                <td></td>
                                <td class="Rate" colspan="2">Total</td>
                                <td class="Payment"> {{
                                    number_format($order_receipt->sum('amount') +
                                    application('tax'), 2) }}<h2>

                                    </h2>
                                </td>
                            </tr>
                        </table>

                        <div id="legalcopy">
                            <address class="legal" style="font-size: 8px">
                                Goods sold in good conditions are not returnable after payment.
                                <br>
                                <span>** Thanks for your patronage **</span>
                            </address>
                        </div>
                            <div>
                                <img src="{{ asset('storage/orders/barcodes/'. $order_receipt[0]->order->barcode() )}}"
                                    alt="{{ $order_receipt[0]->order->barcode() }}" width="170" height="20">
                            </div>
                        <div class="serial-number" style="font-size:10px; ">
                            <span>{{ Date('d:m:Y h:i:s') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>

<style>
    .hero {
        position: absolute;
        opacity: 0.1;
        background-repeat: no-repeat;
    }

    #invoice-POS {
        position: relative;
        /* box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5); */
        padding: 2em;
        margin: 0 auto;
        width: 12em;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center
    }

    #invoice-POS ::selection {
        background: #f315f3;
        color: #fff;
    }

    #invoice-POS ::-moz-selection {
        background: rgb(2, 15, 133);
        color: #fff;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: 0.9em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: 0.7em;
        line-height: 1.2em;
        color: #666;
    }

    #invoice-POS .top,
    #invoice-POS .mid,
    #invoice-POS .bot {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .top {
        min-height: 100px;
    }

    #invoice-POS .mid {
        min-height: 50px;
    }

    #invoice-POS .bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo img {
        height: 10px;
        width: 60px;
        background-image: url('/images/logo.png') no-repeat;
        background-size: 60px 60px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
        text-align: center;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: #eee;
    }

    #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 0.5em;
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
        text-align: center;
    }

    .serial-number {
        margin-top: 5px;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }

    .serial {
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 10px !important;
    }
</style>