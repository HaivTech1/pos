<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use App\Charts\YearlySalesChart;
use App\Charts\MonthlySalesChart;

class DashboardController extends Controller
{
    public function index(YearlySalesChart $chart)
    {
        // dd(date('d/m/Y', strtotime('-2 months')));
        return view('dashboard', [
            'orders' => Orderdetail::todaySales()->get(),
            'chart' => $chart->build()
        ]);
    }
}