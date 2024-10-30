<?php

namespace App\Filament\Resources\KosanResource\Pages;

use App\Filament\Resources\KosanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKosans extends ListRecords
{
    protected static string $resource = KosanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
