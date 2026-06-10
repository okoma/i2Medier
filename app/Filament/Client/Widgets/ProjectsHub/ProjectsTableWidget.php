<?php

namespace App\Filament\Client\Widgets\ProjectsHub;

use App\Models\Project;
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
                TextColumn::make('serviceSubscriptions_count')
                    ->label('Services')
                    ->counts('serviceSubscriptions'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'enquiry'       => 'Enquiry',
                        'proposal_sent' => 'Proposal Sent',
                        'negotiating'   => 'Negotiating',
                        'converted'     => 'Converted',
                        'declined'      => 'Declined',
                    ]),
            ])
            ->recordActions([])
            ->defaultSort('created_at', 'desc');
    }

    protected function getTableQuery(): Builder
    {
        return Project::query()
            ->with(['serviceSubscriptions.onboardingService'])
            ->where('client_id', Auth::user()?->client_id);
    }
}
