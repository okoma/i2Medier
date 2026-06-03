<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class ServiceSubscriptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Subscription')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('catalog_name')
                                    ->label('Service'),
                                TextEntry::make('onboardingVariant.name')
                                    ->label('Direction')
                                    ->placeholder('Base service'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('billing_type')
                                    ->badge(),
                                TextEntry::make('billing_cycle')
                                    ->badge(),
                            ]),
                        Section::make('Dates & Billing')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('starts_at')
                                    ->date(),
                                TextEntry::make('expires_at')
                                    ->date(),
                                TextEntry::make('last_renewed_at')
                                    ->dateTime(),
                                TextEntry::make('price')
                                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('auto_renew')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Enabled' : 'Disabled'),
                            ]),
                    ]),
            ]);
    }
}
