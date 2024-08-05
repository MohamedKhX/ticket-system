<?php

namespace App\Filament\Airline\Widgets;

use App\Models\Airline;
use App\Models\Booking;
use App\Models\Flight;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $airline = Airline::find(Filament::auth()->user()->airline_id);

        $totalRevenue =  $airline->bookings()->sum('total_price');
        $totalFlight   = Flight::where('airline_id', '=', Filament::auth()->user()->airline_id)->count();
        $totalBookings = $airline->bookings()->count();

        return [
            Stat::make('الإيرادات', '$' . $totalRevenue)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('الرحلات',$totalFlight)
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
            Stat::make('الحجوزات', $totalBookings)
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
