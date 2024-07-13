<?php

namespace App\Filament\Airline\Resources\FlightResource\Pages;

use App\Filament\Airline\Resources\FlightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFlight extends EditRecord
{
    protected static string $resource = FlightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
