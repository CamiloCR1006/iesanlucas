<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'active',
        'file'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    Toggle::make('active')
                        ->reactive()
                        ->afterStateUpdated(function (bool $state): void {
                            if ($state) {
                                $calendar = Calendar::where('active', true)->first();
                                if ($calendar) {
                                    $calendar->update([
                                        'active' => false
                                    ]);
                                }
                            }
                        })
                        ->label('Mostrar calendario'),
                    FileUpload::make('file')
                        ->label('Imagen')
                        ->required()
                        ->image()
                ])
        ];
    }

    public static function getColumns(): array
    {
        return [
            IconColumn::make('active')
                ->label('Mostrar en la web'),
            ImageColumn::make('file')
                ->size(200)
                ->label('Archivo')
        ];
    }
}
