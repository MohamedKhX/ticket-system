<?php

namespace App\Filament\Airline\Resources\CustomerResource\Pages;

use App\Filament\Airline\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
