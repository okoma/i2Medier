<?php

namespace App\Filament\Client\Resources\Hosting\Schemas;

use App\Models\HostingAccount;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HostingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
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
                                TextEntry::make('type')
                                    ->label('Hosting Type')
                                    ->formatStateUsing(fn ($state, HostingAccount $record): string => $record->type?->getLabel() ?? '—'),
                                TextEntry::make('primary_domain')
                                    ->label('Primary Domain')
                                    ->copyable()
                                    ->placeholder('—'),
                                TextEntry::make('server_location')
                                    ->label('Server Location')
                                    ->placeholder('—'),
                                TextEntry::make('price')
                                    ->label('Price')
                                    ->formatStateUsing(fn ($state, HostingAccount $record): string => $record->formattedPrice()),
                                TextEntry::make('starts_at')
                                    ->label('Started')
                                    ->date()
                                    ->placeholder('—'),
                                TextEntry::make('expires_at')
                                    ->label('Renewal Date')
                                    ->date()
                                    ->placeholder('—')
                                    ->description(fn (HostingAccount $record): string => match (true) {
                                        $record->daysUntilExpiry() === null    => '',
                                        $record->daysUntilExpiry() < 0        => 'Expired',
                                        $record->daysUntilExpiry() === 0      => 'Expires today',
                                        $record->daysUntilExpiry() <= 30      => $record->daysUntilExpiry() . ' days left',
                                        default                               => '',
                                    }),
                                TextEntry::make('last_backup_at')
                                    ->label('Last Backup')
                                    ->since()
                                    ->placeholder('No backup recorded'),
                            ]),
                        Section::make('Resource Usage')
                            ->columnSpan(1)
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
                                TextEntry::make('notes')
                                    ->placeholder('No notes.')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
