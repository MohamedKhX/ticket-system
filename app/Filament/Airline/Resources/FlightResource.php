<?php

namespace App\Filament\Airline\Resources;

use App\Enums\FlightType;
use App\Filament\Airline\Resources\FlightResource\Pages;
use App\Filament\Airline\Resources\FlightResource\RelationManagers;
use App\Models\Aircraft;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

/*
هذه الصفحة خاصة بالرحلات
لوحة التحكم: شركة الطيران
 * */
class FlightResource extends Resource
{
    protected static ?string $model = Flight::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    /*
       هذه الدالة تحدد الحقول التي ستظهر في صفحة الإنشاء أو تعديل
       * */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Flight Information')
                    ->label('Flight Information')
                    ->translateLabel()
                    ->schema([
                        Forms\Components\Select::make('flight_type')
                            ->label('Flight Type')
                            ->translateLabel()
                            ->prefixIcon('heroicon-o-funnel')
                            ->options(FlightType::getTranslations())
                            ->preload()
                            ->required()
                            ->live()
                            ->columnSpan(2),

                        Forms\Components\Select::make('aircraft_id')
                            ->label('Aircraft')
                            ->translateLabel()
                            ->prefixIcon('entypo-aircraft')
                            ->relationship('aircraft')
                            ->options(Airline::find(Filament::auth()->user()->airline_id)->aircrafts()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(2),

                        Forms\Components\Select::make('departure_airport_id')
                            ->label('Departure Airport')
                            ->translateLabel()
                            ->prefixIcon('entypo-aircraft-take-off')
                            ->relationship('departureAirport')
                            ->options(Airport::all()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(2),

                        Forms\Components\Select::make('arrival_airport_id')
                            ->label('Arrival Airport')
                            ->translateLabel()
                            ->prefixIcon('entypo-aircraft-landing')
                            ->relationship('arrivalAirport')
                            ->options(Airport::all()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(2),

                        Section::make('التاريخ والوقت')
                            ->icon('heroicon-m-clock')
                            ->iconColor('warning')
                            ->schema([
                                Forms\Components\DateTimePicker::make('departure_time')
                                    ->label('Departure Time (One way)')
                                    ->translateLabel()
                                    ->prefixIcon('entypo-clock')
                                    ->required()
                                    ->after(now())
                                    ->native(false),

                                Forms\Components\DateTimePicker::make('arrival_time')
                                    ->label('Arrival Time (One way)')
                                    ->translateLabel()
                                    ->prefixIcon('entypo-clock')
                                    ->required()
                                    ->after('departure_time')
                                    ->native(false),

                                Forms\Components\DateTimePicker::make('return_departure_time')
                                    ->label('Departure Time (Round trip)')
                                    ->translateLabel()
                                    ->prefixIcon('entypo-clock')
                                    ->hidden(fn($get) => $get('flight_type') != FlightType::Round_trip->value)
                                    ->disabled(fn($get) => $get('flight_type') != FlightType::Round_trip->value)
                                    ->required()
                                    ->native(false),

                                Forms\Components\DateTimePicker::make('return_arrival_time')
                                    ->label('Arrival Time (Round trip)')
                                    ->translateLabel()
                                    ->prefixIcon('entypo-clock')
                                    ->hidden(fn($get) => $get('flight_type') != FlightType::Round_trip->value)
                                    ->disabled(fn($get) => $get('flight_type') != FlightType::Round_trip->value)
                                    ->required()
                                    ->native(false),
                            ])
                            ->collapsible()
                            ->columns(2),



                        Section::make('أسعار المقاعد')
                            ->icon('heroicon-m-currency-dollar')
                            ->iconColor('success')
                            ->schema([
                                Forms\Components\TextInput::make('economy_price')
                                    ->label('Economy Seat Price')
                                    ->translateLabel()
                                    ->required()
                                    ->numeric()
                                    ->prefixIcon('heroicon-m-currency-dollar')
                                    ->suffix('د.ل'),

                                Forms\Components\TextInput::make('economy_discount_price')
                                    ->label('Economy Discount Price')
                                    ->translateLabel()
                                    ->numeric()
                                    ->prefixIcon('heroicon-m-currency-dollar')
                                    ->suffix('د.ل'),

                                Forms\Components\TextInput::make('first_class_price')
                                    ->label('First Class Seat Price')
                                    ->translateLabel()
                                    ->required()
                                    ->numeric()
                                    ->prefixIcon('heroicon-m-currency-dollar')
                                    ->suffix('د.ل'),

                                Forms\Components\TextInput::make('first_class_discount_price')
                                    ->label('First Class Discount Price')
                                    ->translateLabel()
                                    ->numeric()
                                    ->prefixIcon('heroicon-m-currency-dollar')
                                    ->suffix('د.ل'),
                            ])
                            ->collapsible()
                            ->columns(2),


                        Section::make('سياسية إلغاء الحجز')
                            ->icon('heroicon-m-x-circle')
                            ->iconColor('danger')
                            ->schema([
                                Forms\Components\TextInput::make('the_period_allowed_for_cancellation_without_paying_a_fee')
                                    ->label('the_period_allowed_for_cancellation_without_paying_a_fee')
                                    ->translateLabel()
                                    ->numeric()
                                    ->minValue(0)
                                    ->required()
                                    ->prefixIcon('heroicon-m-calendar-days')
                                    ->suffix('يوم'),

                                Forms\Components\TextInput::make('percentage_of_cash_back_after_the_grace_period')
                                    ->label('percentage_of_cash_back_after_the_grace_period')
                                    ->translateLabel()
                                    ->numeric()
                                    ->maxValue(100)
                                    ->minValue(0)
                                    ->required()
                                    ->prefixIcon('heroicon-m-receipt-percent')
                                    ->suffix('%'),
                            ])
                            ->collapsible(),

                        Section::make('سياسية الوزن')
                            ->icon('heroicon-m-clipboard-document-list')
                            ->iconColor('info')
                            ->schema([
                                Forms\Components\TextInput::make('checked_baggage_weight_limit')
                                    ->label('checked_baggage_weight_limit')
                                    ->translateLabel()
                                    ->numeric()
                                    ->minValue(0)
                                    ->required()
                                    ->prefixIcon('heroicon-m-scale')
                                    ->suffix('كجم'),

                                Forms\Components\TextInput::make('excess_baggage_fee')
                                    ->label('excess_baggage_fee')
                                    ->translateLabel()
                                    ->numeric()
                                    ->minValue(0)
                                    ->required()
                                    ->prefixIcon('heroicon-m-banknotes')
                                    ->suffix('د.ل'),
                            ])
                            ->collapsible(),


                        Forms\Components\Hidden::make('airline_id')
                            ->default(auth()->user()->airline->id),
                    ]),
            ]);
    }


    /*
      هذه الدالة تحدد الحقول التي ستظهر في الجدول
      * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('aircraft.name')
                    ->label('Aircraft')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('flight_type')
                    ->label('Flight Type')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('departureAirport.name')
                    ->label('Departure Airport')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('arrivalAirport.name')
                    ->label('Arrival Airport')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('departure_time')
                    ->label('Departure Time')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('arrival_time')
                    ->label('Arrival Time')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('economy_price')
                    ->label('Economy Seat Price')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('first_class_price')
                    ->label('First Class Seat Price')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('departure_airport')
                    ->label('departure_airport')
                    ->translateLabel()
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('departureAirport', 'name'),

                //Filter for the departure_airport
                SelectFilter::make('departure_airport')
                    ->label('departure_airport')
                    ->translateLabel()
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('departureAirport', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }


    public static function getNavigationLabel(): string
    {
        return __('Flights');
    }


































    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('airline_id', '=', Filament::auth()->getUser()->airline->id);
    }


    public static function getRelations(): array
    {
        return [
            RelationManagers\BookingsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFlights::route('/'),
            'create' => Pages\CreateFlight::route('/create'),
            'edit' => Pages\EditFlight::route('/{record}/edit'),
        ];
    }



    public static function getLabel(): ?string
    {
        return __('Flight');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Flights');
    }
}
