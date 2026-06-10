<?php

namespace App\Filament\Client\Widgets\ServicesHub;

use App\Models\ServiceSubscription;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ServicesTableWidget extends TableWidget
{
    protected static ?string $heading = 'All Services';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('catalog_name')
                    ->label('Service'),
                TextColumn::make('onboardingService.name')
                    ->label('Plan')
                    ->placeholder('—'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn (ServiceSubscription $record): string =>
                        ($record->status === 'active'
                            && $record->expires_at
                            && $record->expires_at->isBetween(now(), now()->addDays(30)))
                            ? 'expiring_soon'
                            : $record->status
                    )
                    ->color(fn (string $state): string => match ($state) {
                        'active'        => 'success',
                        'expiring_soon' => 'warning',
                        'expired'       => 'danger',
                        'suspended'     => 'warning',
                        default         => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                TextColumn::make('expires_at')
                    ->label('Next Due')
                    ->date()
                    ->sortable()
                    ->placeholder('—')
                    ->description(fn (ServiceSubscription $record): ?string =>
                        $record->expires_at
                            ? ((int) now()->diffInDays($record->expires_at, false)) . ' days left'
                            : null
                    ),
                TextColumn::make('price')
                    ->money(fn (ServiceSubscription $record): string => $record->currency ?? 'NGN'),
                TextColumn::make('billing_cycle')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string =>
                        $state ? ucwords(str_replace('_', ' ', $state)) : '—'
                    ),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active'    => 'Active',
                        'expired'   => 'Expired',
                        'suspended' => 'Suspended',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->recordActions([
                Action::make('manage')
                    ->label('Manage')
                    ->url(fn (ServiceSubscription $record): string =>
                        filament()->getUrl() . '/service-subscriptions/' . $record->id
                    ),
            ])
            ->defaultSort('expires_at', 'asc');
    }

    protected function getTableQuery(): Builder
    {
        return ServiceSubscription::query()
            ->with(['onboardingService', 'onboardingVariant'])
            ->where('client_id', auth()->user()?->client_id);
    }
}
