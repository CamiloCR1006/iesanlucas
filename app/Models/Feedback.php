<?php

namespace App\Models;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'message', 'is_read', 'read_by', 'read_at'];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function readBy()
    {
        return $this->belongsTo(User::class, 'read_by');
    }

    public static function getInfolistSchema()
    {
        return [

            Section::make('')
                ->schema([
                    IconEntry::make('is_read')
                        ->label('Leído'),
                    TextEntry::make('name')
                        ->label('Nombre'),
                    TextEntry::make('message')
                        ->label('Mensaje'),
                    Section::make('Leído por')
                        ->schema([
                            TextEntry::make('readBy.name')
                                ->label('Nombre'),
                            TextEntry::make('read_at')
                                ->label('Fecha de lectura'),
                        ]),

                ])
        ];
    }

    public static function getColumnsTable()
    {
        return [
            TextColumn::make('name')
                ->label('Nombre'),
            TextColumn::make('message')
                ->label('Mensaje')
                ->wrap(),
            ToggleColumn::make('is_read')
                ->afterStateUpdated(function (Feedback $record, bool $state): void {
                    if ($state) {
                        $record->read_by = auth()->user()->id;
                        $record->read_at = now();
                        $record->save();

                        Notification::make()
                            ->title('Mensaje leído')
                            ->success()
                            ->send($record->readBy);
                    }
                })
                ->label('Leído'),

        ];
    }
}
