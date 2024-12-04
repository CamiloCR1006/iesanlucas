<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CircularResource\Pages;
use App\Filament\Resources\CircularResource\RelationManagers;
use App\Models\Circular;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CircularResource extends Resource
{
    protected static ?string $model = Circular::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $modelLabel = "Circular";

    protected static ?string $pluralModelLabel = "Circulares";
    
    protected static ?string $navigationGroup = "Gestión académica";

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Circular::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Circular::getColumns())
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
            'index' => Pages\ListCirculars::route('/'),
            'create' => Pages\CreateCircular::route('/create'),
            'edit' => Pages\EditCircular::route('/{record}/edit'),
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
