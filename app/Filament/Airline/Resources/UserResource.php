<?php

namespace App\Filament\Airline\Resources;

use App\Enums\Gender;
use App\Enums\UserType;
use App\Filament\Airline\Resources\UserResource\Pages;
use App\Filament\Airline\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

/*
هذه الصفحة خاصة بالموظفين
لوحة التحكم: شركة الطيران
 * */
class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    /*
     هذه الدالة تحدد الحقول التي ستظهر في صفحة الإنشاء أو تعديل
     * */
    public static function form(Form $form): Form
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

                Forms\Components\Hidden::make('type')
                    ->default(UserType::Employee->value),

                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->label(__('Roles'))
                    ->options(Role::all()->mapWithKeys(function ($item) {
                        return [$item['id'] => __($item['name'])];
                    })->toArray())
                    ->multiple(),

                Forms\Components\Hidden::make('airline_id')
                    ->default(Filament::auth()->user()->airline_id),

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


    /*
       هذه الدالة تحدد الحقول التي ستظهر في الجدول
       * */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel()
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->translateLabel()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn($state) => $state->translate()),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone Number')
                    ->translateLabel()
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }


    public static function getNavigationLabel(): string
    {
        return __('Employees');
    }





















    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        return $query->where('airline_id', '=', Filament::auth()->user()->airline_id);
    }


    public static function getLabel(): ?string
    {
        return __('Employee');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Employees');
    }
}
