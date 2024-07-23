<?php

namespace App\Filament\Airline\Resources;

use App\Filament\Airline\Resources\FlightResource\Pages;
use App\Filament\Airline\Resources\FlightResource\RelationManagers;
use App\Models\Aircraft;
use App\Models\Airport;
use App\Models\Flight;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FlightResource extends Resource
{
    protected static ?string $model = Flight::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Flight Information')
                    ->label('Flight Information')
                    ->translateLabel()
                    ->schema([
                        Forms\Components\Select::make('aircraft_id')
                            ->label('Aircraft')
                            ->translateLabel()
                            ->prefixIcon('entypo-aircraft')
                            ->relationship('aircraft')
                            ->options(Aircraft::all()->pluck('name', 'id')->toArray())
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

                        Forms\Components\DateTimePicker::make('departure_time')
                            ->label('Departure Time')
                            ->translateLabel()
                            ->prefixIcon('entypo-clock')
                            ->required()
                            ->native(false),

                        Forms\Components\DateTimePicker::make('arrival_time')
                            ->label('Arrival Time')
                            ->translateLabel()
                            ->prefixIcon('entypo-clock')
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('economy_price')
                            ->label('Economy Seat Price')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->prefixIcon('heroicon-m-currency-dollar')
                            ->suffix('د.ل')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('first_class_price')
                            ->label('First Class Seat Price')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->prefixIcon('heroicon-m-currency-dollar')
                            ->suffix('د.ل')
                            ->columnSpan(2),


                        Forms\Components\Hidden::make('airline_id')
                            ->default(auth()->user()->airline->id),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('aircraft.name')
                    ->label('Aircraft')
                    ->translateLabel()
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('airline_id', '=', Filament::auth()->getUser()->airline->id);
    }


    public static function getRelations(): array
    {
        return [
            //
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

    public static function getNavigationLabel(): string
    {
        return __('Flights');
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
