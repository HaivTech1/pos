<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cashier.order.index');
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