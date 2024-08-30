<?php

namespace App\Filament\Reports;

use App\Enums\AgeGroup;
use App\Enums\FlightType;
use App\Enums\SeatType;
use App\Models\Aircraft;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\User;
use EightyNine\Reports\Report;
use EightyNine\Reports\Components\Body;
use EightyNine\Reports\Components\Footer;
use EightyNine\Reports\Components\Header;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use EightyNine\Reports\Components\Text;
use Illuminate\Http\Request;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;
use Mockery\Generator\StringManipulation\Pass\Pass;

class FlightReport extends Report
{
    public ?string $heading = "تقرير sعن الرحلات";


    public function header(Header $header): Header
    {
        return $header
            ->schema([
            ]);
    }


    public function body(Body $body): Body
    {
        return $body
            ->schema([
                Text::make("الركاب")
                    ->fontXl()
                    ->fontBold()
                    ->primary(),

                Body\Layout\BodyColumn::make()
                    ->schema([
                        Body\Table::make()
                            ->columns([
                                Body\TextColumn::make("first_name")
                                    ->label("First Name")
                                    ->translateLabel(),

                                Body\TextColumn::make("last_name")
                                    ->label("Last Name")
                                    ->translateLabel(),

                                Body\TextColumn::make("passport_number")
                                    ->label("Passport Number")
                                    ->translateLabel(),

                                Body\TextColumn::make("seat_type")
                                    ->label("Seat Type")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => SeatType::tryFrom($state)->translate()),

                                Body\TextColumn::make("age_group")
                                    ->label("Age Group")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => AgeGroup::tryFrom($state)->translate()),
                            ])
                            ->data(
                                function () {
                                    $query = Passenger::query();

                                    if(\request()->input('flight_id')) {
                                        $flightId = \request()->input('flight_id');

                                        $query ->whereHas('booking.flight', function ($query) use ($flightId) {
                                            $query->where('id', $flightId);
                                        })
                                            ->with(['booking.flight'])  // Eager load the related booking and flight
                                            ->get();
                                    }

                                    return $query
                                        ->select("first_name", 'last_name', 'passport_number', 'seat_type', 'age_group')
                                        ->take(10)
                                        ->get();
                                }
                            ),
                    ])
            ]);
    }

    public function footer(Footer $footer): Footer
    {
        return $footer
            ->schema([
                // ...
            ]);
    }

    public static function getNavigationLabel(): string
    {
        return __('Flights');
    }


}
