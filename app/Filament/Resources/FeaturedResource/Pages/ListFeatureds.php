<?php

namespace App\Filament\Resources\FeaturedResource\Pages;

use App\Filament\Resources\FeaturedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeatureds extends ListRecords
{
    protected static string $resource = FeaturedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
