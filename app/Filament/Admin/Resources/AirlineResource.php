<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AirlineResource\RelationManagers\UsersRelationManager;
use App\Models\Airline;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
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
                Fieldset::make('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('name')
                            ->translateLabel()
                            ->required()
                            ->unique('airlines', 'name')
                            ->rules('max:255'),

                        RichEditor::make('description')
                            ->label('Brief')
                            ->required()
                            ->translateLabel()
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                    ])->columns(1),
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
            UsersRelationManager::class
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
