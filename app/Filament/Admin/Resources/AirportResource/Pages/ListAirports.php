<?php

namespace App\Filament\Admin\Resources\AirportResource\Pages;

use App\Filament\Admin\Resources\AirportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAirports extends ListRecords
{
    protected static string $resource = AirportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
