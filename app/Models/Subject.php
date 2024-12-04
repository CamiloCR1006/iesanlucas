<?php

namespace App\Models;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'owner_id'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function getForm(): array
    {
        return [
            Grid::make(1)
                ->schema([
                    TextInput::make('name')->required()->label('Name'),
                    Textarea::make('description')->label('Description'),
                    Hidden::make('owner_id')->default(auth()->user()->id),
                ]),
        ];
    }

    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nombre'),
            TextColumn::make('description')
                ->label('Descripción'),
        ];
    }
}
