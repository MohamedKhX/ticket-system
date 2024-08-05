<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Booking;
use App\Models\Flight;
use Filament\Widgets\ChartWidget;

class BookingsChart extends ChartWidget
{
    protected static ?string $heading = 'الحجوزات كل شهر';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $jan  = Booking::whereMonth('created_at', '=', '1')->count();
        $feb  = Booking::whereMonth('created_at', '=', '2')->count();
        $mar  = Booking::whereMonth('created_at', '=', '3')->count();
        $apr  = Booking::whereMonth('created_at', '=', '4')->count();
        $may  = Booking::whereMonth('created_at', '=', '5')->count();
        $june = Booking::whereMonth('created_at', '=', '6')->count();
        $july = Booking::whereMonth('created_at', '=', '7')->count();
        $aug  = Booking::whereMonth('created_at', '=', '8')->count();
        $seb  = Booking::whereMonth('created_at', '=', '9')->count();
        $oct  = Booking::whereMonth('created_at', '=', '10')->count();
        $nov  = Booking::whereMonth('created_at', '=', '11')->count();
        $dec  = Booking::whereMonth('created_at', '=', '12')->count();
        return [
            'datasets' => [
                [
                    'label' => 'الحجوزات',
                    'data' => [$jan, $feb, $mar, $apr, $may, $june, $july, $aug, $seb, $oct, $nov, $dec],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغطسطس', 'سبتمبر', 'أكتوبر', 'نوفبمر', 'ديسمبر'],
        ];
    }
}
