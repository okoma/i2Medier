<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use App\Models\SupportTicket;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListSupportTickets extends ListRecords
{
    protected static string $resource = SupportTicketResource::class;

    protected string $view = 'filament.client.resources.support-tickets.pages.list-support-tickets';

    public array $stats = [];

    public array $tickets = [];

    public function mount(): void
    {
        parent::mount();

        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $query = SupportTicket::query()
            ->where('client_id', $user?->client_id)
            ->latest('updated_at');

        if ($user?->isClientMember()) {
            $query->where('submitted_by', $user->id);
        }

        $tickets = $query->get();

        $this->stats = $this->buildStats($tickets);
        $this->tickets = $tickets->map(fn (SupportTicket $ticket): array => $this->mapTicket($ticket))->all();
    }

    public function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('newTicket')
                ->label('New Ticket')
                ->icon('heroicon-o-plus-circle')
                ->url(SupportTicketResource::getUrl('create', panel: 'client'))
                ->color('primary'),
        ];
    }

    private function buildStats(Collection $tickets): array
    {
        $totalCount = $tickets->count();
        $openCount = $tickets->where('status', 'open')->count();
        $inProgress = $tickets->where('status', 'in_progress')->count();
        $waitingCount = $tickets->where('status', 'waiting_reply')->count();
        $closedCount = $tickets->whereIn('status', ['closed', 'resolved'])->count();

        return [
            [
                'label' => 'All Tickets',
                'value' => (string) $totalCount,
                'description' => 'Every support conversation',
                'icon' => 'heroicon-o-ticket',
                'color' => 'slate',
            ],
            [
                'label' => 'Open',
                'value' => (string) $openCount,
                'description' => $openCount > 0 ? 'Awaiting team review' : 'Nothing newly opened',
                'icon' => 'heroicon-o-envelope-open',
                'color' => $openCount > 0 ? 'rose' : 'emerald',
            ],
            [
                'label' => 'In Progress',
                'value' => (string) $inProgress,
                'description' => 'Currently being worked on',
                'icon' => 'heroicon-o-arrow-path',
                'color' => $inProgress > 0 ? 'sky' : 'emerald',
            ],
            [
                'label' => 'Waiting on You',
                'value' => (string) $waitingCount,
                'description' => $waitingCount > 0 ? 'A reply may be needed' : 'No client response needed',
                'icon' => 'heroicon-o-clock',
                'color' => $waitingCount > 0 ? 'amber' : 'emerald',
            ],
            [
                'label' => 'Resolved',
                'value' => (string) $closedCount,
                'description' => 'Closed or completed requests',
                'icon' => 'heroicon-o-check-circle',
                'color' => 'emerald',
            ],
        ];
    }

    private function mapTicket(SupportTicket $ticket): array
    {
        return [
            'number' => $ticket->ticket_number,
            'subject' => $ticket->subject,
            'status' => ucwords(str_replace('_', ' ', (string) $ticket->status)),
            'status_color' => match ($ticket->status) {
                'open' => 'rose',
                'in_progress' => 'sky',
                'waiting_reply' => 'amber',
                'resolved', 'closed' => 'emerald',
                default => 'slate',
            },
            'priority' => ucfirst((string) $ticket->priority),
            'priority_color' => match ($ticket->priority) {
                'urgent' => 'rose',
                'high' => 'amber',
                'medium' => 'sky',
                default => 'slate',
            },
            'category' => ucfirst((string) $ticket->category),
            'opened_at' => $ticket->created_at?->format('M d, Y'),
            'updated_at' => $ticket->updated_at?->diffForHumans(),
            'description' => $ticket->description,
            'url' => SupportTicketResource::getUrl('view', ['record' => $ticket], panel: 'client'),
        ];
    }
}
