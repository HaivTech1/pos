<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'staff']);
    }

    public function index()
    {
        $orders = Order::all();
        $lastID = Order::orderBy('created_at', 'desc')->max('order_uuid');
        $order_receipt = Orderdetail::with(['order'])->where('order_uuid', $lastID)->get();
        return view('cashier.order.index',['orders' => $orders, 'order_receipt' => $order_receipt]);
    }

    public function pdfview(Request $request)
    {
        $reports = Order::where('created_at', '>=', date('Y-m-d').' 00:00:00')->get();
        view()->share('reports', $reports);

        if ($request->has('download')) {
            $pdf = PDF::loadView('cashier.report.pdfview');
            return $pdf->download('report.pdf');
        }


        return view('cashier.report.pdfview');
    }
}