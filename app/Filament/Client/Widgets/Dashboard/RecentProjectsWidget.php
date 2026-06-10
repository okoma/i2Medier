<?php

namespace App\Filament\Client\Widgets\Dashboard;

use App\Models\Project;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentProjectsWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Projects';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('reference')
                    ->label('Project')
                    ->formatStateUsing(fn (string $state, Project $record): string =>
                        $record->serviceSubscriptions->first()?->catalogName ?? "Project #{$state}"
                    ),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'converted'     => 'success',
                        'declined'      => 'danger',
                        'negotiating',
                        'proposal_sent' => 'info',
                        default         => 'warning',
                    })
                    ->formatStateUsing(fn ($state, Project $record): string =>
                        $record->status?->getLabel() ?? ucfirst($state)
                    ),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->date()
                    ->sortable(),
            ])
            ->paginated(false);
    }

    protected function getTableQuery(): Builder
    {
        return Project::query()
            ->with(['serviceSubscriptions.onboardingService'])
            ->where('client_id', auth()->user()?->client_id)
            ->latest()
            ->limit(3);
    }
}
