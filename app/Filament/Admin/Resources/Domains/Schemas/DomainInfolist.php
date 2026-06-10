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
                                TextEntry::make('registrar')
                                    ->placeholder('—'),
                                TextEntry::make('registered_at')
                                    ->label('Registered')
                                    ->date()
                                    ->placeholder('—'),
                                TextEntry::make('expires_at')
                                    ->label('Expires')
                                    ->date()
                                    ->placeholder('—')
                                    ->description(fn (Domain $record): string => match (true) {
                                        $record->daysUntilExpiry() === null    => '',
                                        $record->daysUntilExpiry() < 0        => 'Expired',
                                        $record->daysUntilExpiry() === 0      => 'Expires today',
                                        $record->daysUntilExpiry() <= 30      => $record->daysUntilExpiry() . ' days left',
                                        default                               => '',
                                    }),
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
                            ]),
                    ]),
            ]);
    }
}
