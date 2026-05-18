<?php

namespace App\Filament\Resources\SupplyChainResource\Pages;

use App\Filament\Resources\SupplyChainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSupplyChain extends CreateRecord
{
    protected static string $resource = SupplyChainResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
