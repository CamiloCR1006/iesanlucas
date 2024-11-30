<?php

namespace App\Filament\Resources\FeaturedResource\Pages;

use App\Filament\Resources\FeaturedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeatured extends CreateRecord
{
    protected static string $resource = FeaturedResource::class;
}
