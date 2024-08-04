<?php

namespace App\Filament\Widgets;

use App\Models\Flight;
use Filament\Widgets\ChartWidget;

class FlightsChart extends ChartWidget
{
    protected static ?string $heading = 'الرحلات كل شهر';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
      //  $jan = Flight::where('created_at', '')
        return [
            'datasets' => [
                [
                    'label' => 'الرحلات',
                    'data' => [2433, 3454, 4566, 3300, 5545, 5765, 6787, 8767, 7565, 8576, 9686, 8996],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغطسطس', 'سبتمبر', 'أكتوبر', 'نوفبمر', 'ديسمبر'],
        ];
    }
}
