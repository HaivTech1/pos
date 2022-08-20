<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Order;
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

        $previousMonths = [];

        $currentDate = Carbon::now()->startOfMonth();
            while ($currentDate->year == Carbon::now()->year) {
            $previousMonths[] = $currentDate->format('m');
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