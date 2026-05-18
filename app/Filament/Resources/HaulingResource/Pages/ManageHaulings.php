<?php

namespace App\Filament\Resources\HaulingResource\Pages;

use App\Filament\Resources\HaulingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHaulings extends ManageRecords
{
    protected static string $resource = HaulingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
