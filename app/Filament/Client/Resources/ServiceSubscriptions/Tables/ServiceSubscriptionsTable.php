<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Tables;

use App\Models\ServiceSubscription;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServiceSubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('catalog_name')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('onboardingService.name')
                    ->label('Plan')
                    ->placeholder('—'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn (ServiceSubscription $record): string =>
                        ($record->status === 'active' && $record->expires_at?->isBetween(now(), now()->addDays(30)))
                            ? 'expiring_soon'
                            : $record->status
                    )
                    ->color(fn (string $state): string => match ($state) {
                        'active'        => 'success',
                        'expiring_soon' => 'warning',
                        'suspended'     => 'warning',
                        'cancelled'     => 'danger',
                        'expired'       => 'gray',
                        default         => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->date()
                    ->sortable()
                    ->placeholder('Never')
                    ->description(fn (ServiceSubscription $record): ?string =>
                        ($record->status === 'active' && $record->expires_at?->isBetween(now(), now()->addDays(30)))
                            ? 'In ' . $record->expires_at->diffForHumans(null, true)
                            : null
                    ),
                TextColumn::make('price')
                    ->money(fn (ServiceSubscription $record): string => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('billing_cycle')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active'    => 'Active',
                        'suspended' => 'Suspended',
                        'cancelled' => 'Cancelled',
                        'expired'   => 'Expired',
                    ]),
                SelectFilter::make('billing_cycle')
                    ->options([
                        'monthly'   => 'Monthly',
                        'quarterly' => 'Quarterly',
                        'biannual'  => 'Bi-annual',
                        'annual'    => 'Annual',
                    ]),
            ])
            ->defaultSort('expires_at', 'asc')
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
