<?php

namespace App\Filament\Admin\Widgets;


use App\Enums\FlightType;
use App\Filament\Resources\Shop\OrderResource;
use App\Models\Aircraft;
use App\Models\Flight;
use App\Models\Shop\Order;
use ArielMejiaDev\FilamentPrintable\Actions\PrintAction;
use Filament\Tables;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Squire\Models\Currency;

class FlightsTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Flights'))
            ->query(Flight::query())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('airline.name')
                    ->label('Airline')
                    ->searchable()
                    ->translateLabel()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('aircraft.name')
                    ->label('Aircraft')
                    ->searchable()
                    ->translateLabel()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('flight_type')
                    ->label('Flight Type')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('flight_status')
                    ->label('Flight Status')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('departureAirport.name')
                    ->label('Departure Airport')
                    ->translateLabel()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('arrivalAirport.name')
                    ->label('Arrival Airport')
                    ->translateLabel()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('departure_time')
                    ->label('Departure Time')
                    ->translateLabel()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('arrival_time')
                    ->label('Arrival Time')
                    ->translateLabel()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('economy_price')
                    ->label('Economy Seat Price')
                    ->translateLabel()
                    ->badge()
                    ->color('success')
                    ->suffix(' د.ل')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('first_class_price')
                    ->label('First Class Seat Price')
                    ->translateLabel()
                    ->badge()
                    ->color('success')
                    ->suffix(' د.ل')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('economyBookedSeats')
                    ->label('Economy Booked Seats')
                    ->translateLabel()
                    ->badge()
                    ->color('warning')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('firstClassBookedSeats')
                    ->label('First Class Booked Seats')
                    ->translateLabel()
                    ->badge()
                    ->color('warning')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        SelectConstraint::make('flight_type')
                            ->label('Flight Type')
                            ->translateLabel()
                            ->options(FlightType::getTranslations())
                            ->multiple(),

                        RelationshipConstraint::make('airline')
                            ->label('Airline')
                            ->translateLabel()
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple(),
                            ),

                        RelationshipConstraint::make('aircraft')
                            ->label('Aircraft')
                            ->translateLabel()
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple(),
                            ),

                        RelationshipConstraint::make('departureAirport')
                            ->label('Departure Airport')
                            ->translateLabel()
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple(),
                            ),

                        RelationshipConstraint::make('arrivalAirport')
                            ->label('Arrival Airport')
                            ->translateLabel()
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple(),
                            ),

                        DateConstraint::make('departure_time')
                            ->label('Departure Time')
                            ->translateLabel(),

                        DateConstraint::make('arrival_time')
                            ->label('Arrival Time')
                            ->translateLabel(),

                        NumberConstraint::make('economy_price')
                            ->label('Economy Seat Price')
                            ->translateLabel(),

                        NumberConstraint::make('first_class_price')
                            ->label('First Class Seat Price')
                            ->translateLabel(),
                    ])
            ], layout: Tables\Enums\FiltersLayout::AboveContent)
            ->actions([]);
    }
}
