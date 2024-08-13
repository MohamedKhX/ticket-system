<?php

namespace App\Livewire;

use App\Enums\AgeGroup;
use App\Enums\SeatType;
use App\Enums\TripDestination;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Concerns\InteractsWithTableQuery;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mockery\Generator\StringManipulation\Pass\Pass;

class FlightsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithTableQuery;
    use InteractsWithPageFilters;
    use InteractsWithActions, InteractsWithInfolists;

    #[Url]
    public ?array $tableFilters = null;

    public function table(Table $table): Table
    {
        return $table //where('departure_time', '>=', now())
            ->query(Flight::query())
            ->columns([
                ImageColumn::make('airline.logo')
                    ->circular()
                    ->label(''),

                TextColumn::make('airline.name')
                    ->label('Airline')
                    ->translateLabel(),

                TextColumn::make('aircraft.name')
                    ->label('Aircraft')
                    ->translateLabel(),

                TextColumn::make('flight_type')
                    ->label('Flight Type')
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->translateLabel(),

                TextColumn::make('departureAirport.name')
                    ->label('Departure Airport')
                    ->translateLabel(),

                TextColumn::make('arrivalAirport.name')
                    ->label('Arrival Airport')
                    ->translateLabel(),

                TextColumn::make('departure_time')
                    ->label('Departure Time')
                    ->translateLabel()
                    ->dateTime('Y-m-d H:i'),

                TextColumn::make('arrival_time')
                    ->label('Arrival Time')
                    ->translateLabel()
                    ->dateTime('Y-m-d H:i'),

                TextColumn::make('economyPriceFormatted')
                    ->label('Economy Seat Price')
                    ->translateLabel()

                    ->badge()
                    ->color('success')
                    ->html(),

                TextColumn::make('firstClassPriceFormatted')
                    ->label('First Class Seat Price')
                    ->translateLabel()
                    ->badge()
                    ->color('success'),
            ])
            ->filters([
                SelectFilter::make('airline')
                    ->label('Airline')
                    ->translateLabel()
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('airline', 'name'),

                SelectFilter::make('departure_airport')
                    ->label('departure_airport')
                    ->translateLabel()
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('departureAirport', 'name'),

                SelectFilter::make('arrival_airport')
                    ->label('arrival_airport')
                    ->translateLabel()
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('arrivalAirport', 'name'),

                Filter::make('date')
                    ->form([
                        DatePicker::make('departure_time')
                            ->label('departure_time')
                            ->translateLabel()
                            ->native(false),

                        DatePicker::make('arrival_time')
                            ->label('arrival_time')
                            ->translateLabel()
                            ->native(false),

                    ])
                    ->query(function ($query, array $data) {
                        $query->when($data['departure_time'])
                            ->whereDate('departure_time', $data['departure_time']);
                        $query->when($data['arrival_time'])
                            ->whereDate('arrival_time', $data['arrival_time']);
                    })
                    ->columns(2)
                    ->columnSpan(2),

                Filter::make('trip_destination')
                    ->form([
                        Select::make('trip_destination')
                            ->label('Trip Destination')
                            ->translateLabel()
                            ->options(TripDestination::getTranslations())
                            ->columnSpan(2),

                    ])
                    ->query(function ($query, array $data) {
                        $query->when($data['trip_destination'] == TripDestination::DomesticFlights->value)
                            ->whereHas('departureAirport', function ($query) {
                                $query->where('country', '=', 'ليبيا');
                            });
                        $query->when($data['trip_destination'] == TripDestination::ForeignTrips->value)
                            ->whereHas('departureAirport', function ($query) {
                                $query->where('country', '!=', 'ليبيا');
                            });
                    })
                    ->columns(2)
                    ->columnSpan(1),

            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                Action::make('حجز')
                    ->icon('heroicon-s-ticket')
                    ->form([
                        Wizard::make([
                            Wizard\Step::make('الركاب')
                                ->schema([
                                    Fieldset::make('Flight Info')
                                        ->label(__('Flight Info'))
                                        ->schema([

                                            Placeholder::make('Airline')
                                                ->label(__('Airline'))
                                                ->content(fn(Flight $record) => $record->airline->name),

                                            Placeholder::make('Flight Type')
                                                ->label(__('Flight Type'))
                                                ->content(fn(Flight $record) => $record->flight_type->translate()),

                                            Placeholder::make('Departure Airport')
                                                ->label(__('Departure Airport'))
                                                ->content(fn(Flight $record) => $record->departureAirport->name),

                                            Placeholder::make('Arrival Airport')
                                                ->label(__('Arrival Airport'))
                                                ->content(fn(Flight $record) => $record->arrivalAirport->name),

                                            Placeholder::make('Departure Time')
                                                ->label(__('Departure Time (One way)'))
                                                ->content(fn(Flight $record) => $record->departure_time),

                                            Placeholder::make('Arrival Time')
                                                ->label(__('Arrival Time (One way)'))
                                                ->content(fn(Flight $record) => $record->arrival_time),

                                            Placeholder::make('Departure Time')
                                                ->label(__('Departure Time (Round trip)'))
                                                ->content(fn(Flight $record) => $record->return_departure_time)
                                                ->hidden(fn($record) => ! $record->return_departure_time),

                                            Placeholder::make('Arrival Time')
                                                ->label(__('Arrival Time (Round trip)'))
                                                ->content(fn(Flight $record) => $record->return_arrival_time)
                                                ->hidden(fn($record) => ! $record->return_departure_time),

                                            Placeholder::make('Economy Seat Price')
                                                ->label(__('Economy Seat Price'))
                                                ->content(fn(Flight $record) => $record->economy_price . ' د.ل'),

                                            Placeholder::make('First Class Seat Price')
                                                ->label(__('First Class Seat Price'))
                                                ->content(fn(Flight $record) => $record->first_class_price . ' د.ل'),


                                            Placeholder::make('Number of economy seats remaining')
                                                ->label(__('Number of economy seats remaining'))
                                                ->content(fn(Flight $flight) => $flight->economySeatsRemaining()),

                                            Placeholder::make('Number of first class seats remaining')
                                                ->label(__('Number of first class seats remaining'))
                                                ->content(fn(Flight $flight) => $flight->firstClassSeatsRemaining()),

                                        ]),

                                    Repeater::make('passengers')
                                        ->label(__('passengers'))
                                        ->schema([
                                            TextInput::make('first_name')
                                                ->label(__('first_name'))
                                                ->required(),

                                            TextInput::make('last_name')
                                                ->label(__('last_name'))
                                                ->required(),

                                            Select::make('age_group')
                                                ->label(__('age_group'))
                                                ->options(AgeGroup::getTranslations())
                                                ->required(),

                                            Select::make('seat_type')
                                                ->label(__('seat_type'))
                                                ->options(SeatType::getTranslations())
                                                ->required(),

                                            TextInput::make('passport_number')
                                                ->label(__('passport_number'))
                                                ->columnSpan(2)
                                                ->regex('/^[A-Za-z0-9]+$/u')
                                                ->required()
                                                ->minLength(9)
                                                ->maxLength(9),
                                        ])
                                        ->minItems(1)
                                        ->columns(2)
                                        ->live(),

                                    Fieldset::make('passengers_info')
                                        ->label(__('passengers_info'))
                                        ->schema([
                                            Placeholder::make('Passengers count')
                                                ->label(__('Passengers count'))
                                                ->content(fn($get) => count($get('passengers'))),

                                            Placeholder::make('Total Price')
                                                ->label(__('Total price'))
                                                ->content(fn($get, Flight $record) => $this->getTotalPrice($get('passengers'), $record) . ' د.ل'),
                                        ]),
                                ]),
                            Wizard\Step::make('الأمتعة')
                                ->schema([
                                    Fieldset::make('Flight Info')
                                        ->label(__('Flight Info'))
                                        ->schema([
                                            Placeholder::make('Allowed Baggage Weight Limit')
                                                ->label(__('Allowed Baggage Weight Limit'))
                                                ->content(fn(Flight $record) => $record->checked_baggage_weight_limit . ' كجم'),

                                            Placeholder::make('Excess Baggage Fee Per 1 kgm')
                                                ->label(__('Excess Baggage Fee Per 1 kgm'))
                                                ->content(fn(Flight $record) => $record->excess_baggage_fee . ' د.ل'),
                                        ]),
                                ]),
                            Wizard\Step::make('باقية المعلومات')
                                ->schema([
                                    TextInput::make('email')
                                        ->label(__('Email'))
                                        ->required()
                                        ->email(),

                                    TextInput::make('phone')
                                        ->label(__('Phone Number'))
                                        ->required()
                                        ->tel()
                                        ->numeric()
                                        ->maxLength(255)
                                ]),
                            Wizard\Step::make('الدفع')
                                ->schema([
                                    Fieldset::make('passengers_info')
                                        ->label(__('passengers_info'))
                                        ->schema([
                                            Placeholder::make('Passengers count')
                                                ->label(__('Passengers count'))
                                                ->content(fn($get) => count($get('passengers'))),

                                            Placeholder::make('Total Price')
                                                ->label(__('Total price'))
                                                ->content(fn($get, Flight $record) => $this->getTotalPrice($get('passengers'), $record) . ' د.ل'),
                                        ]),


                                ]),
                        ])->submitAction(new HtmlString('<button type="submit" style="background-color: #0a58ca; color: white; padding: 10px 20px; border-radius: 10px">تأكيد</button>'))
                    ])
                    ->color('danger')
                    ->modalSubmitAction(false)
                    ->action(function (Flight $record, array $data) {
                        $booking = Booking::create([
                            'flight_id' => $record->id,
                            'user_id' => 1,
                            'passenger_count' => count($data['passengers']),
                            'total_price' => $this->getTotalPrice($data['passengers'], $record),
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                        ]);

                        foreach($data['passengers'] as $passenger) {
                            Passenger::create([
                                'first_name'      => $passenger['first_name'],
                                'last_name'       => $passenger['last_name'],
                                'age_group'       => $passenger['age_group'],
                                'seat_type'       => $passenger['seat_type'],
                                'passport_number' => $passenger['passport_number'],
                                'booking_id'      => $booking->id,
                            ]);
                        }

                        $booking->generateTickets();

                        return redirect()->route('checkout', [
                            'booking' => $booking
                        ]);
                    })
            ]);
    }

    public function getTotalPrice(array $passengers, $record)
    {
        $total_price = 0;

        foreach($passengers as $passenger) {
            if($passenger['seat_type'] == SeatType::Economy->value) {
                $total_price += $record->economyPriceSeat;
            }
            if($passenger['seat_type'] == SeatType::First_class->value) {
                $total_price += $record->firstClassPriceSeat;
            }
        }

        return $total_price;
    }

    public function render()
    {
        return view('livewire.flights-table');
    }
}
