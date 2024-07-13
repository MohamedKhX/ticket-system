<?php

namespace App\Filament\Admin\Resources;

use App\Models\Airline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AirlineResource extends Resource
{
    protected static ?string $model = Airline::class;

    protected static ?string $navigationIcon = 'entypo-aircraft';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('name')
                    ->translateLabel()
                    ->required()
                    ->unique('airlines', 'name')
                    ->rules('max:255'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
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
            'index' => \App\Filament\Admin\Resources\AirlineResource\Pages\ListAirlines::route('/'),
            'create' => \App\Filament\Admin\Resources\AirlineResource\Pages\CreateAirline::route('/create'),
            'edit' => \App\Filament\Admin\Resources\AirlineResource\Pages\EditAirline::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Airlines');
    }

    public static function getLabel(): ?string
    {
        return __('Airline');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Airlines');
    }
}
