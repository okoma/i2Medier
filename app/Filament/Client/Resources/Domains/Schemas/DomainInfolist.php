<?php

namespace App\Filament\Client\Resources\Domains\Schemas;

use App\Models\Domain;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DomainInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Domain Details')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                TextEntry::make('domain_name')
                                    ->label('Domain Name')
                                    ->copyable()
                                    ->weight('semibold'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('management_type')
                                    ->label('Management')
                                    ->badge(),
                                TextEntry::make('registrar')
                                    ->placeholder('Not specified'),
                                TextEntry::make('registered_at')
                                    ->label('Registered')
                                    ->date()
                                    ->placeholder('—'),
                                TextEntry::make('expires_at')
                                    ->label('Billing Expiry')
                                    ->placeholder('—')
                                    ->formatStateUsing(fn (mixed $_, Domain $record): string =>
                                        $record->expires_at
                                            ? $record->expires_at->format('d M Y') . match (true) {
                                                $record->daysUntilExpiry() < 0    => ' · Expired',
                                                $record->daysUntilExpiry() === 0  => ' · Expires today',
                                                $record->daysUntilExpiry() <= 30  => ' · ' . $record->daysUntilExpiry() . ' days left',
                                                default                           => '',
                                            }
                                            : '—'
                                    ),
                                TextEntry::make('whois_expires_at')
                                    ->label('Registrar Expiry (WHOIS)')
                                    ->date()
                                    ->placeholder('—')
                                    ->visible(fn (Domain $record): bool => $record->whois_expires_at !== null),
                                TextEntry::make('whois_status_raw')
                                    ->label('Domain Health')
                                    ->placeholder('—')
                                    ->state(function (Domain $record): ?string {
                                        if ($record->status === \App\Enums\DomainStatus::Fraud) {
                                            return 'fraud';
                                        }

                                        if (blank($record->whois_status_raw)) {
                                            return null;
                                        }

                                        $codes = array_map(
                                            fn (string $c): string => strtolower(trim($c)),
                                            explode(',', $record->whois_status_raw)
                                        );

                                        if (in_array('pendingdelete', $codes)) {
                                            return 'expired';
                                        }

                                        if (in_array('serverhold', $codes)) {
                                            return 'suspended_registry';
                                        }

                                        if (in_array('clienthold', $codes)) {
                                            return 'suspended_registrar';
                                        }

                                        if (in_array('redemptionperiod', $codes)) {
                                            return 'redemption';
                                        }

                                        if (in_array('autorenewperiod', $codes)) {
                                            return 'expired_grace';
                                        }

                                        if (in_array('ok', $codes)) {
                                            return 'active';
                                        }

                                        return null;
                                    })
                                    ->badge()
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'active'               => 'Active',
                                        'expired_grace'        => 'Expired (Grace Period)',
                                        'redemption'           => 'Expired (Recoverable)',
                                        'expired'              => 'Expired',
                                        'suspended_registrar'  => 'Suspended by Registrar',
                                        'suspended_registry'   => 'Suspended by Registry',
                                        'fraud'                => 'Fraud',
                                        default                => $state,
                                    })
                                    ->color(fn (string $state): string => match ($state) {
                                        'active'               => 'success',
                                        'expired_grace'        => 'warning',
                                        'suspended_registrar'  => 'warning',
                                        'redemption'           => 'danger',
                                        'expired'              => 'danger',
                                        'suspended_registry'   => 'danger',
                                        'fraud'                => 'danger',
                                        default                => 'gray',
                                    })
                                    ->tooltip(fn (?string $state): ?string => match ($state) {
                                        'active'               => 'Your domain is active and working normally.',
                                        'expired_grace'        => 'Your domain has expired but is still in the grace period. Please renew immediately to avoid losing it.',
                                        'redemption'           => 'Your domain has expired and entered the redemption period. Recovery is still possible but will incur a high fee. Contact us immediately.',
                                        'expired'              => 'Your domain has expired and is scheduled for deletion. Contact us immediately.',
                                        'suspended_registrar'  => 'Your domain has been suspended by the registrar. Contact us so we can resolve this.',
                                        'suspended_registry'   => 'Your domain has been suspended at the registry level. Contact us immediately.',
                                        'fraud'                => 'A potential issue has been detected with this domain. Please contact us immediately.',
                                        default                => null,
                                    })
                                    ->visible(fn (Domain $record): bool => $record->whois_last_checked_at !== null),
                                TextEntry::make('nameservers')
                                    ->label('Nameservers')
                                    ->columnSpanFull()
                                    ->placeholder('—')
                                    ->formatStateUsing(fn ($state): string =>
                                        is_array($state) ? implode("\n", $state) : ($state ?? '—')
                                    ),
                            ]),

                        Section::make('Settings')
                            ->columnSpan(1)
                            ->schema([
                                IconEntry::make('auto_renew')
                                    ->label('Auto-Renew')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-arrow-path')
                                    ->falseIcon('heroicon-o-x-mark')
                                    ->trueColor('success')
                                    ->falseColor('gray'),
                                IconEntry::make('privacy_protected')
                                    ->label('Privacy Protection')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-shield-check')
                                    ->falseIcon('heroicon-o-shield-exclamation')
                                    ->trueColor('success')
                                    ->falseColor('gray'),
                                TextEntry::make('whois_last_checked_at')
                                    ->label('WHOIS Monitoring')
                                    ->since()
                                    ->placeholder('Not yet monitored')
                                    ->visible(fn (Domain $record): bool => $record->whois_last_checked_at !== null),
                                TextEntry::make('notes')
                                    ->placeholder('No notes.')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
