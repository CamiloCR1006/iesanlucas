<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturedResource\Pages;
use App\Filament\Resources\FeaturedResource\RelationManagers;
use App\Models\Featured;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeaturedResource extends Resource
{
    protected static ?string $model = Featured::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = "Destacada";

    protected static ?string $pluralModelLabel = "Destacadas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Featured::getSchemaForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Featured::getColumnsTable())
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeatureds::route('/'),
            'create' => Pages\CreateFeatured::route('/create'),
            'view' => Pages\ViewFeatured::route('/{record}'),
            'edit' => Pages\EditFeatured::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
