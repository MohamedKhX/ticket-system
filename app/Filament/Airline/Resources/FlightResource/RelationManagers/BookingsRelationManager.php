<?php

namespace App\Filament\Airline\Resources\FlightResource\RelationManagers;

use App\Enums\BookingStatus;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('email')
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone Number')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Booked At')
                    ->translateLabel()
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('passengerCount')
                    ->label('Passenger Count')
                    ->translateLabel()
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total price')
                    ->translateLabel()
                    ->badge()
                    ->color('success'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                    ->color('primary')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                RepeatableEntry::make('passengers')
                    ->schema([
                        TextEntry::make('first_name')
                            ->label('First Name')
                            ->translateLabel(),

                        TextEntry::make('last_name')
                            ->label('Last Name')
                            ->translateLabel(),

                        TextEntry::make('seat_type')
                            ->label('Seat Type')
                            ->translateLabel()
                            ->formatStateUsing(fn($state) => $state->translate())
                            ->badge(),

                        TextEntry::make('age_group')
                            ->label('Age Group')
                            ->translateLabel()
                            ->formatStateUsing(fn($state) => $state->translate())
                            ->badge(),

                        TextEntry::make('passport_number')
                            ->label('Passport Number')
                            ->translateLabel(),
                    ])
                    ->columns(2)
                    ->columnSpan(2)
            ]);
    }


    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('status', '=', BookingStatus::Booked_up->value);
    }

    public function isReadOnly(): bool
    {
        return true;
    }
    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('bookings');
    }

    public static function getRecordLabel(): string
    {
        return __('booking');
    }

    public static function getModelLabel(): ?string
    {
        return __('booking');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('bookings');
    }
}
