<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class YearlySalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $yearTransactions = Orderdetail::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(order_uuid)"))
        ->pluck('count');

        $yearMonths = Orderdetail::select(DB::raw("Month(transac_date) as month"))
            ->whereYear('transac_date', date('Y'))
            ->groupBy(DB::raw("Month(transac_date)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($yearMonths as $index => $month) {
            $datas[$month] = $yearTransactions[$index];
        }
        
        dd($yearTransactions);

        $previousMonths = [];

        $currentDate = Carbon::now()->startOfMonth();

        while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('F');
            $currentDate->subMonth();
        } 
        
        // dd($previousMonths);
        $data = [1,2,3];
        return $this->chart->pieChart()
            ->setTitle('Monthly Sales Record.')
            ->setSubtitle('Cummulative sales for the year')
            ->addData($data)
            ->setLabels($previousMonths);
    }
}