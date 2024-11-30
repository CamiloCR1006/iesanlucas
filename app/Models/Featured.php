<?php

namespace App\Models;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Featured extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'owner_id',
        'filepath',
        'published_at',
        'active'
    ];

    protected $dates = ['deleted_at', 'published_at'];

    public static string $OWNER = "Creado por";
    public static string $PUBLISHED_AT = "Fecha de publicación";
    public static string $ACTIVE =  "Mostrar destacada";
    public static string $FILEPATH = "Archivo";

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public static function getSchemaForm(): array
    {
        return [
            Section::make()
                ->schema([
                    Hidden::make('owner_id')
                        ->default(auth()->user()->id),
                    FileUpload::make('filepath')
                        ->required()
                        ->image()
                        ->label(self::$FILEPATH),
                    DateTimePicker::make('published_at')
                        ->label(self::$PUBLISHED_AT)
                        ->required()
                        ->default(now()),
                    Toggle::make('active')
                        ->label(self::$ACTIVE),

                ])
        ];
    }
}
