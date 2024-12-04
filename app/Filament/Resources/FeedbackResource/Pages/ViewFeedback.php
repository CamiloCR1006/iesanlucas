<?php

namespace App\Filament\Resources\FeedbackResource\Pages;

use App\Filament\Resources\FeedbackResource;
use App\Models\Feedback;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedback extends ViewRecord
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('read')
                ->label('Marcar como leído')
                ->visible(fn(Feedback $record) => !$record->is_read)
                ->action(function (Feedback $record): void {
                    $record->update([
                        'is_read' => true,
                        'read_by' => auth()->user()->id,
                        'read_at' => now(),
                    ]);

                    Notification::make()
                        ->title('Mensaje marcado como leído')
                        ->success()
                        ->send();
                })
        ];
    }
}
