<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Data Laporan Penjualan')
            ->setSubtitle('Total Penjualan Bulanan')
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setHeight(300)
            ->setWidth(500)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
