<?php

namespace App\Filament\Resources\FeaturedResource\Pages;

use App\Filament\Resources\FeaturedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeatured extends EditRecord
{
    protected static string $resource = FeaturedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
