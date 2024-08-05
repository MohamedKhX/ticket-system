<?php

namespace App\Filament\Admin\Widgets;


use App\Models\Flight;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Model;

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
        $jan  = Flight::whereMonth('created_at', '=', '1')->count();
        $feb  = Flight::whereMonth('created_at', '=', '2')->count();
        $mar  = Flight::whereMonth('created_at', '=', '3')->count();
        $apr  = Flight::whereMonth('created_at', '=', '4')->count();
        $may  = Flight::whereMonth('created_at', '=', '5')->count();
        $june = Flight::whereMonth('created_at', '=', '6')->count();
        $july = Flight::whereMonth('created_at', '=', '7')->count();
        $aug  = Flight::whereMonth('created_at', '=', '8')->count();
        $seb  = Flight::whereMonth('created_at', '=', '9')->count();
        $oct  = Flight::whereMonth('created_at', '=', '10')->count();
        $nov  = Flight::whereMonth('created_at', '=', '11')->count();
        $dec  = Flight::whereMonth('created_at', '=', '12')->count();

        return [
            'datasets' => [
                [
                    'label' => 'الرحلات',
                    'data' => [$jan, $feb, $mar, $apr, $may, $june, $july, $aug, $seb, $oct, $nov, $dec],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغطسطس', 'سبتمبر', 'أكتوبر', 'نوفبمر', 'ديسمبر'],
        ];
    }
}
