<?php

namespace App\Filament\Airline\Resources\AircraftResource\Pages;

use App\Filament\Airline\Resources\AircraftResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAircraft extends ListRecords
{
    protected static string $resource = AircraftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
