<?php

namespace App\Filament\Reports;

use App\Enums\FlightType;
use App\Models\Aircraft;
use App\Models\Airport;
use App\Models\Flight;
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
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;

class FlightsReport extends Report
{
    public ?string $heading = "تقرير عن الرحلات";


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
                Text::make("الرحلات")
                    ->fontXl()
                    ->fontBold()
                    ->primary(),
                Body\Layout\BodyColumn::make()
                    ->schema([
                        Body\Table::make()
                            ->columns([
                                Body\TextColumn::make("id")
                                    ->label("")
                                    ->translateLabel()
                                    ->hidden(true),

                                Body\TextColumn::make("aircraft_id")
                                    ->label("Aircraft")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => Aircraft::find($state)->name)
                                    ->url(fn($record) => 'flight-report?flight_id=' . $record['id']),

                                Body\TextColumn::make("flight_type")
                                    ->label("Flight Type")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => FlightType::tryFrom($state)->translate()),


                                Body\TextColumn::make("departure_airport_id")
                                    ->label("Departure Airport")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => Airport::find($state)->name),

                                Body\TextColumn::make("arrival_airport_id")
                                    ->label("Arrival Airport")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => Airport::find($state)->name),

                                Body\TextColumn::make("departure_time")
                                    ->label("Departure Time")
                                    ->translateLabel()
                                    ->date(),

                                Body\TextColumn::make("arrival_time")
                                    ->label("Arrival Time")
                                    ->translateLabel()
                                    ->date(),

                                Body\TextColumn::make("economy_price")
                                    ->label("Economy Seat Price")
                                    ->translateLabel()
                                    ->badge()
                                    ->suffix(' د.ل'),

                                Body\TextColumn::make("first_class_price")
                                    ->label("First Class Seat Price")
                                    ->translateLabel()
                                    ->badge()
                                    ->suffix(' د.ل'),
                            ])
                            ->data(
                                function (?array $filters) {
                                    $flightType        = $filters['flight_type']      ?? null;
                                    $aircrafts         = $filters['aircraft']         ?? null;
                                    $departureAirports = $filters['departureAirport'] ?? null;
                                    $arrivalAirports   = $filters['arrivalAirport']   ?? null;
                                    $departureTime     = $filters['departure_time']   ?? null;
                                    $arrivalTime       = $filters['arrival_time']     ?? null;

                                    $flightQuery = Flight::query();

                                    if(Filament::auth()->user()->airline_id) {
                                        $flightQuery->where('airline_id', Filament::auth()->user()->airline_id);
                                    }

                                    return $flightQuery
                                        ->when($flightType, function ($query, $flightType) {
                                            return $query->where('flight_type', $flightType);
                                        })
                                        ->when($aircrafts, function ($query, $aircrafts) {
                                            return $query->whereIn('aircraft_id', $aircrafts);
                                        })
                                        ->when($departureAirports, function ($query, $departureAirports) {
                                            return $query->whereIn('departure_airport_id', $departureAirports);
                                        })
                                        ->when($arrivalAirports, function ($query, $arrivalAirports) {
                                            return $query->whereIn('arrival_airport_id', $arrivalAirports);
                                        })
                                        ->when($departureTime, function ($query, $departureTime) {
                                            return $query->whereDate('departure_time', '=', $departureTime);
                                        })
                                        ->when($arrivalTime, function ($query, $arrivalTime) {
                                            return $query->whereDate('arrival_time', '=', $arrivalTime);
                                        })
                                        ->select('id', "aircraft_id", 'flight_type', 'departure_airport_id', 'arrival_airport_id', 'departure_time', 'arrival_time', 'economy_price', 'first_class_price')
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

    public function filterForm(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('flight_type')
                    ->label('Flight Type')
                    ->translateLabel()
                    ->options(FlightType::getTranslations())
                    ->multiple(),

                Select::make('aircraft')
                    ->label('Aircraft')
                    ->translateLabel()
                    ->options(Aircraft::pluck('name', 'id')->toArray())
                    ->preload()
                    ->multiple(),

                Select::make('departureAirport')
                    ->label('Departure Airport')
                    ->translateLabel()
                    ->options(Airport::pluck('name', 'id')->toArray())
                    ->preload()
                    ->multiple(),


                Select::make('arrivalAirport')
                    ->label('Arrival Airport')
                    ->translateLabel()
                    ->options(Airport::pluck('name', 'id')->toArray())
                    ->preload()
                    ->multiple(),

                DatePicker::make("departure_time")
                    ->label("Departure Time")
                    ->translateLabel(),
                DatePicker::make("arrival_time")
                    ->label("Arrival Time")
                    ->translateLabel(),

            ]);
    }

    public static function getNavigationLabel(): string
    {
        return __('Flights');
    }


}
