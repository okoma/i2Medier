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
                                TextEntry::make('registrar')
                                    ->placeholder('Not specified'),
                                TextEntry::make('registered_at')
                                    ->label('Registered')
                                    ->date()
                                    ->placeholder('—'),
                                TextEntry::make('expires_at')
                                    ->label('Expires')
                                    ->date()
                                    ->placeholder('—')
                                    ->description(fn (Domain $record): string => match (true) {
                                        $record->daysUntilExpiry() === null     => '',
                                        $record->daysUntilExpiry() < 0         => 'Expired',
                                        $record->daysUntilExpiry() === 0       => 'Expires today',
                                        $record->daysUntilExpiry() <= 30       => $record->daysUntilExpiry() . ' days left',
                                        default                                => '',
                                    }),
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
                                TextEntry::make('notes')
                                    ->placeholder('No notes.')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
