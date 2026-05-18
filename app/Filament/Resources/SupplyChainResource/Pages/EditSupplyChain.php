<?php

namespace App\Filament\Resources\SupplyChainResource\Pages;

use App\Filament\Resources\SupplyChainResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplyChain extends EditRecord
{
    protected static string $resource = SupplyChainResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
