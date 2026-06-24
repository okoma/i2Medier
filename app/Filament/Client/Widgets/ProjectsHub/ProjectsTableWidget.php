<?php

namespace App\Filament\Client\Widgets\ProjectsHub;

use App\Models\Project;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProjectsTableWidget extends TableWidget
{
    protected static ?string $heading = 'All Projects';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('reference')
                    ->label('Project')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => "Project {$state}")
                    ->description(function (Project $record): string {
                        $serviceNames = collect($record->services ?? [])
                            ->pluck('variant_name')
                            ->filter()
                            ->values();

                        if ($serviceNames->isEmpty()) {
                            $serviceNames = collect($record->services ?? [])
                                ->pluck('service_name')
                                ->filter()
                                ->values();
                        }

                        return $serviceNames->isNotEmpty()
                            ? $serviceNames->take(2)->join(', ') . ($serviceNames->count() > 2 ? ' +' . ($serviceNames->count() - 2) . ' more' : '')
                            : 'Custom project request';
                    }),
                TextColumn::make('status')
                    ->label('Stage')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'converted'     => 'success',
                        'negotiating',
                        'proposal_sent' => 'info',
                        'declined'      => 'gray',
                        default         => 'warning',
                    })
                    ->formatStateUsing(fn ($state, Project $record): string =>
                        match ($record->status?->value ?? $state) {
                            'enquiry' => 'Request Received',
                            'proposal_sent' => 'Proposal Shared',
                            'negotiating' => 'In Review',
                            'converted' => 'Active',
                            'declined' => 'Closed',
                            default => $record->status?->getLabel() ?? ucfirst($state),
                        }
                    ),
                TextColumn::make('services_summary')
                    ->label('Services')
                    ->state(function (Project $record): string {
                        $serviceNames = collect($record->services ?? [])
                            ->pluck('service_name')
                            ->filter()
                            ->unique()
                            ->values();

                        return $serviceNames->isNotEmpty()
                            ? $serviceNames->take(2)->join(', ') . ($serviceNames->count() > 2 ? ' +' . ($serviceNames->count() - 2) : '')
                            : '—';
                    })
                    ->wrap(),
                TextColumn::make('next_step')
                    ->label('Next Step')
                    ->state(function (Project $record): string {
                        $pendingTask = $record->onboardingTasks
                            ->first(fn ($task) => $task->status === 'pending');

                        if ($pendingTask) {
                            return $pendingTask->title;
                        }

                        return match ($record->status?->value) {
                            'enquiry' => 'We are reviewing your request',
                            'proposal_sent' => 'Review your proposal',
                            'negotiating' => 'Awaiting alignment',
                            'converted' => 'Project is active',
                            'declined' => 'No further action',
                            default => '—',
                        };
                    })
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Last Activity')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'enquiry'       => 'Request Received',
                        'proposal_sent' => 'Proposal Shared',
                        'negotiating'   => 'In Review',
                        'converted'     => 'Active',
                        'declined'      => 'Closed',
                    ]),
            ])
            ->recordActions([
                Action::make('viewProject')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Project $record): string =>
                        filament()->getUrl() . '/projects/' . $record->id
                    ),
            ])
            ->defaultSort('created_at', 'desc');
    }

    protected function getTableQuery(): Builder
    {
        return Project::query()
            ->with(['serviceSubscriptions.onboardingService', 'onboardingTasks'])
            ->where('client_id', Auth::user()?->client_id);
    }
}
