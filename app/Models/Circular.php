<?php

namespace App\Models;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circular extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'file', 'owner_id', 'active'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    Toggle::make('active')
                        ->label('Mostrar en la web')
                        ->default(true),
                    TextInput::make('title')
                        ->label('Título')
                        ->required(),
                    Textarea::make('description')
                        ->label('Descripción'),
                    FileUpload::make('file')
                        ->label('Archivo')
                        ->required(),
                    Hidden::make('owner_id')
                        ->default(auth()->user()->id)
                ])
        ];
    }

    public static function getColumns() : array {
        return [
            TextColumn::make('title')
                ->label('Título'),
            TextColumn::make('description')
                ->label('Descripción'),
        ];
    }
}
