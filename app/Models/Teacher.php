<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'img', 'description', 'active'];

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre')
                        ->required(),
                    Textarea::make('description')
                        ->label('Descripción'),
                    FileUpload::make('img')
                        ->label('Imagen')
                        ->image()
                        ->required(),
                ])
        ];
    }

    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nombre'),
            TextColumn::make('description')
                ->label('Descripción'),
            ImageColumn::make('img')
                ->label('Imagen')
        ];
    }
}
