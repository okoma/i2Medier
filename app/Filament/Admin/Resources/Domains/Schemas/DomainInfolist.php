<?php

namespace App\Filament\Admin\Resources\Domains\Schemas;

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
                        Section::make('Domain')
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
                                    ->placeholder('—'),
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
                                TextEntry::make('price')
                                    ->label('Price')
                                    ->money(fn (Domain $record): string => $record->currency ?? 'NGN')
                                    ->placeholder('—')
                                    ->visible(fn (Domain $record): bool => $record->isI2Managed()),
                                TextEntry::make('billing_cycle')
                                    ->label('Billing Cycle')
                                    ->placeholder('—')
                                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                                        'monthly'   => 'Monthly',
                                        'quarterly' => 'Quarterly',
                                        'biannual'  => 'Bi-annual',
                                        'annual'    => 'Annual',
                                        'biennial'  => 'Biennial (2 years)',
                                        default     => '—',
                                    })
                                    ->visible(fn (Domain $record): bool => $record->isI2Managed()),
                                TextEntry::make('nameservers')
                                    ->label('Nameservers')
                                    ->columnSpanFull()
                                    ->placeholder('—')
                                    ->formatStateUsing(fn ($state): string =>
                                        is_array($state) ? implode(', ', $state) : ($state ?? '—')
                                    ),
                                TextEntry::make('notes')
                                    ->placeholder('—')
                                    ->columnSpanFull(),
                            ]),

                        Grid::make(1)
                            ->columnSpan(1)
                            ->schema([
                                Section::make('Client')
                                    ->schema([
                                        TextEntry::make('client.company_name')
                                            ->label('Company'),
                                        TextEntry::make('client.contact_name')
                                            ->label('Contact'),
                                        TextEntry::make('client.email')
                                            ->label('Email')
                                            ->copyable(),
                                    ]),

                                Section::make('Settings')
                                    ->schema([
                                        IconEntry::make('auto_renew')
                                            ->label('Auto-Renew')
                                            ->boolean(),
                                        IconEntry::make('privacy_protected')
                                            ->label('Privacy Protection')
                                            ->boolean(),
                                        TextEntry::make('creator.name')
                                            ->label('Added by')
                                            ->placeholder('—'),
                                        TextEntry::make('created_at')
                                            ->label('Added')
                                            ->dateTime(),
                                    ]),

                                Section::make('Access Credentials')
                                    ->visible(fn (Domain $record): bool => ! $record->isI2Managed())
                                    ->schema([
                                        TextEntry::make('access_registrar_url')
                                            ->label('Registrar URL')
                                            ->placeholder('—')
                                            ->url(fn (Domain $record): ?string => $record->access_registrar_url)
                                            ->openUrlInNewTab(),
                                        TextEntry::make('access_username')
                                            ->label('Username')
                                            ->placeholder('—')
                                            ->copyable(),
                                        TextEntry::make('access_notes')
                                            ->label('Notes')
                                            ->placeholder('—'),
                                        TextEntry::make('dummy_password')
                                            ->label('Password')
                                            ->default('••••••••••••')
                                            ->visible(fn (Domain $record): bool => $record->hasCredentials()),
                                    ]),
                            ]),

                        Section::make('WHOIS Monitoring')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                TextEntry::make('whois_expires_at')
                                    ->label('WHOIS Expiry')
                                    ->date()
                                    ->placeholder('Not checked yet'),
                                TextEntry::make('whois_registrar')
                                    ->label('WHOIS Registrar')
                                    ->placeholder('—'),
                                TextEntry::make('whois_status_raw')
                                    ->label('WHOIS Status')
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
                                        'active'               => 'Domain is registered and fully operational.',
                                        'expired_grace'        => 'Domain has expired and is in the auto-renew grace period. Still accessible but renewal must be confirmed.',
                                        'redemption'           => 'Domain has passed the grace period. Recovery is still possible for a high fee before it is permanently deleted.',
                                        'expired'              => 'Domain is queued for permanent deletion. Recovery is no longer possible.',
                                        'suspended_registrar'  => 'Domain has been suspended by the registrar, typically due to non-payment or a policy violation.',
                                        'suspended_registry'   => 'Domain has been suspended by the registry (ICANN). Usually related to legal or serious compliance issues.',
                                        'fraud'                => 'This domain has been flagged as potentially fraudulent. Review nameservers and registration details immediately.',
                                        default                => null,
                                    }),
                                TextEntry::make('whois_last_checked_at')
                                    ->label('Last Checked')
                                    ->since()
                                    ->placeholder('Never'),
                                IconEntry::make('alert_sent_30')
                                    ->label('30-day alert sent')
                                    ->boolean(),
                                IconEntry::make('alert_sent_14')
                                    ->label('14-day alert sent')
                                    ->boolean(),
                                IconEntry::make('alert_sent_7')
                                    ->label('7-day alert sent')
                                    ->boolean(),
                            ]),
                    ]),
            ]);
    }
}
