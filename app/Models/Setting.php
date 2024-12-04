<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;

class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'is_file',
        'value',
    ];

    protected $casts = [
        'is_file' => 'boolean',
    ];

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre')
                        ->live(onBlur: false)
                        ->required(),
                    Hidden::make('slug')
                        ->default(fn(Get $get) => Str::slug($get('name'), '_')),
                    Toggle::make('is_file')
                        ->reactive()
                        ->label('¿Es un archivo?'),
                    Textarea::make('value')
                        ->label('Valor')
                        ->visible(fn(Get $get) => !$get('is_file'))
                        ->required(),
                    FileUpload::make('value')
                        ->label('Archivo')
                        ->visible(fn(Get $get) => $get('is_file'))
                        ->required(),
                ]),
        ];
    }

    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nombre'),
            IconColumn::make('is_file')
                ->label('¿Es un archivo?'),
            TextColumn::make('value')
                ->formatStateUsing(function (Setting $record) {
                    if ($record->is_file) {
                        return new HtmlString('<img  class="w-20 h-auto" src="' . asset("storage/{$record->value}") . '" />');
                    } else {
                        return $record->value;
                    }
                })
                ->label('Valor'),
        ];
    }
}
