<?php

namespace App\Filament\Client\Widgets;

use App\Models\ServiceSubscription;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class UpcomingRenewals extends TableWidget
{
    protected static ?string $heading = 'Upcoming Renewals';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('website.name')
                    ->label('Website')
                    ->searchable(),
                TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('expires_at')
                    ->date()
                    ->sortable(),
                TextColumn::make('price')
                    ->money(fn ($record) => $record->currency ?? 'NGN'),
            ])
            ->defaultPaginationPageOption(5);
    }

    protected function getTableQuery(): Builder
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        return ServiceSubscription::query()
            ->with(['website', 'service'])
            ->where('client_id', $user?->client_id)
            ->whereNotNull('expires_at')
            ->orderBy('expires_at')
            ->limit(5);
    }
}
