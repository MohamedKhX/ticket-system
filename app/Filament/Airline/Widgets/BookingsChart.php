<?php

namespace App\Filament\Airline\Widgets;

use App\Models\Airline;
use App\Models\Booking;
use App\Models\Flight;
use Filament\Facades\Filament;
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
        $airline = Airline::find(Filament::auth()->user()->airline_id);

        $jan  = $airline->bookings()->whereMonth('bookings.created_at', '=', '1')->count();
        $feb  = $airline->bookings()->whereMonth('bookings.created_at', '=', '2')->count();
        $mar  = $airline->bookings()->whereMonth('bookings.created_at', '=', '3')->count();
        $apr  = $airline->bookings()->whereMonth('bookings.created_at', '=', '4')->count();
        $may  = $airline->bookings()->whereMonth('bookings.created_at', '=', '5')->count();
        $june = $airline->bookings()->whereMonth('bookings.created_at', '=', '6')->count();
        $july = $airline->bookings()->whereMonth('bookings.created_at', '=', '7')->count();
        $aug  = $airline->bookings()->whereMonth('bookings.created_at', '=', '8')->count();
        $seb  = $airline->bookings()->whereMonth('bookings.created_at', '=', '9')->count();
        $oct  = $airline->bookings()->whereMonth('bookings.created_at', '=', '10')->count();
        $nov  = $airline->bookings()->whereMonth('bookings.created_at', '=', '11')->count();
        $dec  = $airline->bookings()->whereMonth('bookings.created_at', '=', '12')->count();

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
