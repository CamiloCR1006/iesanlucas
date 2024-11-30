<?php

namespace App\Filament\Resources\NoveltyResource\Pages;

use App\Filament\Resources\NoveltyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNovelties extends ListRecords
{
    protected static string $resource = NoveltyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
