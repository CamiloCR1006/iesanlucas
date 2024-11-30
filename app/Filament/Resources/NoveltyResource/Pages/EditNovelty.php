<?php

namespace App\Filament\Resources\NoveltyResource\Pages;

use App\Filament\Resources\NoveltyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNovelty extends EditRecord
{
    protected static string $resource = NoveltyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
