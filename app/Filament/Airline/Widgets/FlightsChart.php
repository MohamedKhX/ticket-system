<?php

namespace App\Filament\Airline\Widgets;

use App\Models\Flight;
use Filament\Facades\Filament;
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
        $jan  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '1')->count();
        $feb  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '2')->count();
        $mar  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '3')->count();
        $apr  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '4')->count();
        $may  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '5')->count();
        $june = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '6')->count();
        $july = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '7')->count();
        $aug  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '8')->count();
        $seb  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '9')->count();
        $oct  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '10')->count();
        $nov  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '11')->count();
        $dec  = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->whereMonth('created_at', '=', '12')->count();

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
