<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoveltyResource\Pages;
use App\Filament\Resources\NoveltyResource\RelationManagers;
use App\Models\Novelty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoveltyResource extends Resource
{
    protected static ?string $model = Novelty::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $modelLabel = "Novedad";

    protected static ?string $pluralModelLabel = "Novedades";

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Novelty::getSchemaForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Novelty::getColumnsTable())
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
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
            'index' => Pages\ListNovelties::route('/'),
            'create' => Pages\CreateNovelty::route('/create'),
            'edit' => Pages\EditNovelty::route('/{record}/edit'),
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
