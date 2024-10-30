<?php

namespace App\Filament\Resources\KosanResource\Pages;

use App\Filament\Resources\KosanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKosan extends EditRecord
{
    protected static string $resource = KosanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
