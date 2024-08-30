<?php

namespace App\Filament\Airline\Resources;

use App\Filament\Airline\Resources\CustomerResource\Pages;
use App\Filament\Airline\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\CustomerMessage;
use ArielMejiaDev\FilamentPrintable\Actions\PrintBulkAction;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = CustomerMessage::class;

    protected static ?string $navigationIcon = 'entypo-newsletter';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Customer Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone Number')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('primary'),
            ]);
    }































    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('airline_id', '=', Filament::auth()->user()->airline_id);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist):  \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('')
                    ->translateLabel()
                    ->schema([
                        TextEntry::make('name')
                            ->label('Customer Name')
                            ->translateLabel(),

                        TextEntry::make('email')
                            ->label('Email')
                            ->translateLabel(),

                        TextEntry::make('phone')
                            ->label('Phone Number')
                            ->translateLabel(),
                    ])
                    ->columns(3),

                Fieldset::make('')
                    ->translateLabel()
                    ->schema([
                        TextEntry::make('message')
                            ->label('Message')
                            ->translateLabel(),
                    ])
                    ->columns(1),


            ])
            ->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
        ];
    }



    public static function getNavigationLabel(): string
    {
        return __('Customer Services');
    }

    public static function getLabel(): ?string
    {
        return __('Customer Services');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Customer Services');
    }
}
