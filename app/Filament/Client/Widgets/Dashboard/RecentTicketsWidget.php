<?php

namespace App\Filament\Client\Widgets\Dashboard;

use App\Models\SupportTicket;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentTicketsWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Support Tickets';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('ticket_number')
                    ->label('Ticket')
                    ->fontFamily('mono'),
                TextColumn::make('subject')
                    ->limit(50),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'resolved', 'closed' => 'success',
                        'in_progress',
                        'waiting_reply'      => 'info',
                        default              => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->date()
                    ->sortable(),
            ])
            ->paginated(false);
    }

    protected function getTableQuery(): Builder
    {
        return SupportTicket::query()
            ->where('client_id', auth()->user()?->client_id)
            ->latest()
            ->limit(5);
    }
}
