<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Schemas;

use App\Models\HostingAccount;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HostingAccountInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Hosting Plan')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Plan Name')
                                    ->weight('semibold'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('management_type')
                                    ->label('Management')
                                    ->badge(),
                                TextEntry::make('type')
                                    ->label('Type')
                                    ->formatStateUsing(fn (mixed $_, HostingAccount $record): string => $record->type?->getLabel() ?? '—'),
                                TextEntry::make('primary_domain')
                                    ->label('Primary Domain')
                                    ->copyable()
                                    ->placeholder('—'),
                                TextEntry::make('server_location')
                                    ->label('Server Location')
                                    ->placeholder('—'),
                                TextEntry::make('control_panel_url')
                                    ->label('Control Panel')
                                    ->placeholder('—')
                                    ->url(fn (HostingAccount $record): ?string => $record->control_panel_url)
                                    ->openUrlInNewTab(),
                                TextEntry::make('price')
                                    ->label('Price')
                                    ->formatStateUsing(fn (mixed $_, HostingAccount $record): string => $record->formattedPrice()),
                                TextEntry::make('monthly_equivalent_display')
                                    ->label('Monthly Equivalent')
                                    ->state(fn (HostingAccount $record): string => $record->formattedMonthlyEquivalent())
                                    ->visible(fn (HostingAccount $record): bool => $record->isI2Managed() && $record->monthlyEquivalent() !== null),
                                TextEntry::make('starts_at')
                                    ->label('Started')
                                    ->date()
                                    ->placeholder('—'),
                                TextEntry::make('expires_at')
                                    ->label('Renewal Date')
                                    ->placeholder('—')
                                    ->formatStateUsing(fn (mixed $_, HostingAccount $record): string =>
                                        $record->expires_at
                                            ? $record->expires_at->format('d M Y') . match (true) {
                                                $record->daysUntilExpiry() < 0    => ' · Expired',
                                                $record->daysUntilExpiry() === 0  => ' · Expires today',
                                                $record->daysUntilExpiry() <= 30  => ' · ' . $record->daysUntilExpiry() . ' days left',
                                                default                           => '',
                                            }
                                            : '—'
                                    ),
                                TextEntry::make('last_backup_at')
                                    ->label('Last Backup')
                                    ->since()
                                    ->placeholder('No backup recorded'),
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

                                Section::make('Resource Usage')
                                    ->schema([
                                        TextEntry::make('cpu_usage_percent')
                                            ->label('CPU')
                                            ->suffix('%')
                                            ->badge()
                                            ->color(fn (int $state): string => match (true) {
                                                $state >= 80 => 'danger',
                                                $state >= 60 => 'warning',
                                                default      => 'success',
                                            }),
                                        TextEntry::make('ram_usage_percent')
                                            ->label('RAM')
                                            ->suffix('%')
                                            ->badge()
                                            ->color(fn (int $state): string => match (true) {
                                                $state >= 80 => 'danger',
                                                $state >= 60 => 'warning',
                                                default      => 'success',
                                            }),
                                        TextEntry::make('disk_usage_percent')
                                            ->label('Disk')
                                            ->suffix('%')
                                            ->badge()
                                            ->color(fn (int $state): string => match (true) {
                                                $state >= 80 => 'danger',
                                                $state >= 60 => 'warning',
                                                default      => 'success',
                                            }),
                                        TextEntry::make('bandwidth_usage_percent')
                                            ->label('Bandwidth')
                                            ->suffix('%')
                                            ->badge()
                                            ->color(fn (int $state): string => match (true) {
                                                $state >= 80 => 'danger',
                                                $state >= 60 => 'warning',
                                                default      => 'success',
                                            }),
                                    ]),

                                Section::make('Access Credentials')
                                    ->visible(fn (HostingAccount $record): bool => ! $record->isI2Managed())
                                    ->schema([
                                        TextEntry::make('access_panel_url')
                                            ->label('Panel URL')
                                            ->placeholder('—')
                                            ->url(fn (HostingAccount $record): ?string => $record->access_panel_url)
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
                                            ->visible(fn (HostingAccount $record): bool => $record->hasCredentials()),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
