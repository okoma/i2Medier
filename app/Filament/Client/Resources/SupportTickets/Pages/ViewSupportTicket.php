<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use App\Models\TicketReply;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewSupportTicket extends ViewRecord
{
    protected static string $resource = SupportTicketResource::class;

    protected string $view = 'filament.client.resources.support-tickets.pages.view-support-ticket';

    public function mount(int|string $record): void
    {
        parent::mount($record);

        $this->record->load([
            'submitter',
            'assignee',
            'replies' => fn ($query) => $query->where('is_internal', false)->with('author')->oldest('created_at'),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('backToTickets')
                ->label('Back to Tickets')
                ->icon('heroicon-o-arrow-left')
                ->url(SupportTicketResource::getUrl('index', panel: 'client'))
                ->color('gray'),
            Action::make('reply')
                ->label('Add Reply')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('primary')
                ->form([
                    Textarea::make('body')
                        ->label('Reply')
                        ->required()
                        ->rows(6),
                ])
                ->action(function (array $data): void {
                    TicketReply::query()->create([
                        'support_ticket_id' => $this->record->id,
                        'user_id' => auth()->id(),
                        'body' => $data['body'],
                        'is_internal' => false,
                    ]);

                    if ($this->record->status === 'waiting_reply') {
                        $this->record->update([
                            'status' => 'open',
                        ]);
                    }

                    $this->record->load([
                        'submitter',
                        'assignee',
                        'replies' => fn ($query) => $query->where('is_internal', false)->with('author')->oldest('created_at'),
                    ]);

                    Notification::make()
                        ->title('Reply sent')
                        ->success()
                        ->send();
                }),
        ];
    }

    public function getStatusMeta(): array
    {
        return match ($this->record->status) {
            'open' => ['label' => 'Open', 'color' => 'rose'],
            'in_progress' => ['label' => 'In Progress', 'color' => 'sky'],
            'waiting_reply' => ['label' => 'Waiting Reply', 'color' => 'amber'],
            'resolved' => ['label' => 'Resolved', 'color' => 'emerald'],
            'closed' => ['label' => 'Closed', 'color' => 'slate'],
            default => ['label' => ucwords(str_replace('_', ' ', (string) $this->record->status)), 'color' => 'slate'],
        };
    }

    public function getPriorityMeta(): array
    {
        return match ($this->record->priority) {
            'urgent' => ['label' => 'Urgent', 'color' => 'rose'],
            'high' => ['label' => 'High', 'color' => 'amber'],
            'medium' => ['label' => 'Medium', 'color' => 'sky'],
            default => ['label' => ucfirst((string) $this->record->priority), 'color' => 'slate'],
        };
    }
}
