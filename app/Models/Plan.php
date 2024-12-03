<?php

namespace App\Models;

use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category',
        'subcategory',
        'subject',
        'file',
        'owner_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')->label('Nombre')
                        ->required(),
                    Select::make('category')
                        ->native(false)
                        ->label('Categoría')
                        ->required()
                        ->options(config('settings.category')),
                    Select::make('subcategory')
                        ->native(false)
                        ->label('Grado')
                        ->required()
                        ->options(function (Get $get): array {
                            if ($get('category') === null) {
                                return [];
                            } else {
                                return config('settings.subcategory')[$get('category')];
                            }
                        }),
                    Select::make('subject')
                        ->required()
                        ->label('Materia')
                        ->searchable()
                        ->options(Subject::all()->pluck('name', 'id')),
                    FileUpload::make('file')
                        ->label('Archivo')
                        ->required(),
                    Hidden::make('owner_id')
                        ->default(auth()->user()->id),
                ])
        ];
    }


    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nombre')
                ->searchable()
                ->sortable(),
            TextColumn::make('category')
                ->label('Categoría')
                ->formatStateUsing(fn(string $state) => config('settings.category')[$state]),
            TextColumn::make('subcategory')
                ->label('Grado')
                ->formatStateUsing(fn(string $state, Plan $record) => config('settings.subcategory')[$record->category][$state]),
            TextColumn::make('subject')
                ->label('Materia')
                ->formatStateUsing(fn(string $state) => config('settings.subject')[$state]),
        ];
    }
}
