<?php

namespace App\Filament\Admin\Resources\AirportResource\Pages;

use App\Filament\Admin\Resources\AirportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAirport extends EditRecord
{
    protected static string $resource = AirportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
