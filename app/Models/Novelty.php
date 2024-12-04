<?php

namespace App\Models;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Novelty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'filepath',
        'published_at',
        'active'
    ];

    protected $dates = [
        'published_at',
        'deleted_at'
    ];



    public static string $ACTIVE = 'Mostrar en la página principal';
    public static string $PUBLISHED_AT = 'Fecha de publicación';
    public static string $TITLE = 'Título';
    public static string $DESCRIPTION = 'Resumen';
    public static string $FILEPATH = 'Imagen';



    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }


    public static function getColumnsTable(): array
    {
        return [
            ImageColumn::make('filepath')
                ->label(self::$FILEPATH)
                ->size(200),
            TextColumn::make('title')
                ->weight('bold')
                ->label(self::$TITLE),
            TextColumn::make('description')
                ->wrap()
                ->label(self::$DESCRIPTION),


        ];
    }

    public static function getSchemaForm(): array
    {
        return [
            Section::make()
                ->schema([
                    Hidden::make('owner_id')
                        ->default(auth()->user()->id),
                    Toggle::make('active')
                        ->label(self::$ACTIVE),
                    DateTimePicker::make('published_at')
                        ->default(now())
                        ->native(false)
                        ->label(self::$PUBLISHED_AT),
                    TextInput::make('title')
                        ->required()
                        ->label(self::$TITLE),
                    Textarea::make('description')
                        ->required()
                        ->label(self::$DESCRIPTION),
                    FileUpload::make('filepath')
                        ->label(self::$FILEPATH)
                        ->required()
                        ->image(),
                ])
        ];
    }
}
