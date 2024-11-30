<?php

namespace App\Filament\Resources\FeaturedResource\Pages;

use App\Filament\Resources\FeaturedResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFeatured extends ViewRecord
{
    protected static string $resource = FeaturedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
