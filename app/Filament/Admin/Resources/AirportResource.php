<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AirportResource\Pages;
use App\Filament\Admin\Resources\AirportResource\RelationManagers;
use App\Models\Airport;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

/*
هذه الصفحة خاصة بالمطارات
لوحة التحكم: الادمن
 * */
class AirportResource extends Resource
{
    protected static ?string $model = Airport::class;

    protected static ?string $navigationIcon = 'entypo-aircraft-landing';

    /*
     هذه الدالة تحدد الحقول التي ستظهر في صفحة الإنشاء أو تعديل
     * */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('name')
                            ->translateLabel()
                            ->required()
                            ->unique('airports', 'name')
                            ->rules('max:255'),

                        Forms\Components\TextInput::make('city')
                            ->label('city')
                            ->translateLabel()
                            ->required()
                            ->rules('max:255'),


                        Forms\Components\TextInput::make('country')
                            ->label('country')
                            ->translateLabel()
                            ->required()
                            ->rules('max:255'),
                    ])
                    ->columns(1)
            ]);
    }


    /*
     هذه الدالة تحدد الحقول التي ستظهر في الجدول
     * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('city')
                    ->label('city')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('country')
                    ->label('country')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }


    public static function getNavigationLabel(): string
    {
        return __('Airports');
    }
























    public static function getLabel(): ?string
    {
        return __('Airport');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Airports');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAirports::route('/'),
            'create' => Pages\CreateAirport::route('/create'),
            'edit' => Pages\EditAirport::route('/{record}/edit'),
        ];
    }
}
