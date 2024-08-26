<?php

namespace App\Filament\Admin\Resources\AirlineResource\RelationManagers;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Models\Airline;
use App\Models\Flight;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('Name')
                    ->translateLabel()
                    ->required()
                    ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                    ->minLength(3)
                    ->maxLength(255),

                Forms\Components\TextInput::make('middle_name')
                    ->label('Middle Name')
                    ->translateLabel()
                    ->required()
                    ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                    ->minLength(3)
                    ->maxLength(255),

                Forms\Components\TextInput::make('last_name')
                    ->label('Last Name')
                    ->translateLabel()
                    ->required()
                    ->regex('/^[\p{Arabic}a-zA-Z\s]*$/u')
                    ->minLength(3)
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone Number')
                    ->translateLabel()
                    ->required()
                    ->tel()
                    ->numeric()
                    ->unique('users', 'phone', ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->options(Gender::getTranslations())
                    ->required(),

                Forms\Components\Hidden::make('roles')
                    ->default('admin'),


                Forms\Components\Hidden::make('type')
                    ->default(UserType::Employee->value),

                Forms\Components\Hidden::make('airline_id')
                    ->default(fn(Airline $airline) => $airline->id),

                Forms\Components\Fieldset::make('user info')
                    ->label('User Info')
                    ->translateLabel()
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->translateLabel()
                            ->required()
                            ->email()
                            ->unique('users', 'email', ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->translateLabel()
                            ->required()
                            ->password()
                            ->maxLength(255)
                            ->disabledOn(['edit', 'view'])
                            ->hiddenOn(['edit', 'view']),
                    ])
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->after(function () {
                        $user = User::orderBy('created_at', 'desc')->first();
                        $user->assignRole('admin');
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }

    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('Supervisors');
    }

    public static function getRecordLabel(): string
    {
        return __('Supervisor');
    }

    public static function getModelLabel(): ?string
    {
        return __('Supervisors');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('Employees');
    }
}
