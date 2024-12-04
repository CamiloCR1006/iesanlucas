<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduateResource\Pages;
use App\Filament\Resources\GraduateResource\RelationManagers;
use App\Models\Graduate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GraduateResource extends Resource
{
    protected static ?string $model = Graduate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $modelLabel = "Egresado";

    protected static ?string $pluralModelLabel = "Egresados";

    protected static ?string $navigationGroup = "Formularios";

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Graduate::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(Graduate::getColumns())
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListGraduates::route('/'),
            #'create' => Pages\CreateGraduate::route('/create'),
            #'edit' => Pages\EditGraduate::route('/{record}/edit'),
            'view' => Pages\ViewGraduate::route('/{record}'),
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
