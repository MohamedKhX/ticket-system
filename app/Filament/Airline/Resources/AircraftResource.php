<?php

namespace App\Filament\Airline\Resources;

use App\Filament\Airline\Resources\AircraftResource\Pages;
use App\Filament\Airline\Resources\AircraftResource\RelationManagers;
use App\Models\Aircraft;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AircraftResource extends Resource
{
    protected static ?string $model = Aircraft::class;

    protected static ?string $navigationIcon = 'entypo-aircraft';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Aircraft Information')
                    ->label('Aircraft Information')
                    ->translateLabel()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Aircraft Name')
                            ->translateLabel()
                            ->required()
                            ->maxLength(255)
                            ->placeholder(__('Enter the aircraft name'))
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('economy_seats')
                            ->label('Economy Seats')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->placeholder(__('Enter the seats number'))
                            ->prefixIcon('heroicon-m-chevron-up')
                            ->suffix('مقعد')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('first_class_seats')
                            ->label('First Class Seats')
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->placeholder(__('Enter the seats number'))
                            ->prefixIcon('heroicon-m-chevron-double-up')
                            ->suffix('مقعد')
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Aircraft Name')
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('economy_seats')
                    ->label('Economy Seats')
                    ->translateLabel()
                    ->sortable(),

                Tables\Columns\TextColumn::make('first_class_seats')
                    ->label('First Class Seats')
                    ->translateLabel()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('airline_id', '=', Filament::auth()->getUser()->airline->id);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAircraft::route('/'),
            'create' => Pages\CreateAircraft::route('/create'),
            'edit' => Pages\EditAircraft::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Aircrafts');
    }

    public static function getLabel(): ?string
    {
        return __('Aircraft');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Aircrafts');
    }
}
