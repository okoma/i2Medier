<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Project')
                            ->columnSpan(2)
                            ->schema([
                                TextEntry::make('reference')
                                    ->copyable(),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('timeline'),
                                TextEntry::make('budget'),
                                TextEntry::make('source')
                                    ->label('Discovery source'),
                                TextEntry::make('domain_preference'),
                                TextEntry::make('hosting_preference'),
                                TextEntry::make('message')
                                    ->label('Project notes')
                                    ->columnSpanFull(),
                                TextEntry::make('brief_pdf')
                                    ->label('Uploaded brief')
                                    ->columnSpanFull()
                                    ->placeholder('—')
                                    ->formatStateUsing(fn (?string $state): string => $state ? basename($state) : '—')
                                    ->url(fn (?string $state): ?string => $state ? Storage::url($state) : null)
                                    ->openUrlInNewTab()
                                    ->hidden(fn (Project $record): bool => blank($record->brief_pdf)),
                            ]),
                        Section::make('Client')
                            ->columnSpan(1)
                            ->schema([
                                TextEntry::make('client.contact_name')
                                    ->label('Full Name'),
                                TextEntry::make('client.company_name')
                                    ->label('Business / Organisation'),
                                TextEntry::make('client.email')
                                    ->label('Email Address')
                                    ->copyable(),
                                TextEntry::make('client.whatsapp_number')
                                    ->label('WhatsApp / Phone')
                                    ->copyable(),
                                TextEntry::make('client.country')
                                    ->label('Country'),
                            ]),
                        Section::make('Selected Services')
                            ->columnSpanFull()
                            ->schema([
                                RepeatableEntry::make('services')
                                    ->label('')
                                    ->schema([
                                        TextEntry::make('service_name')
                                            ->label('Service'),
                                        TextEntry::make('variant_name')
                                            ->label('Direction')
                                            ->placeholder('—'),
                                        TextEntry::make('price')
                                            ->label('Price')
                                            ->money(fn ($record): string => $record['currency'] ?? 'NGN'),
                                        TextEntry::make('billing_type')
                                            ->label('Billing'),
                                        TextEntry::make('pages')
                                            ->label('Pages included')
                                            ->columnSpanFull()
                                            ->placeholder('—')
                                            ->formatStateUsing(fn ($state): string =>
                                                is_array($state) && count($state) > 0
                                                    ? implode(' · ', $state)
                                                    : '—'
                                            )
                                            ->visible(fn ($state): bool =>
                                                is_array($state) && count($state) > 0
                                            ),
                                        RepeatableEntry::make('addons')
                                            ->label('Add-ons')
                                            ->columnSpanFull()
                                            ->schema([
                                                TextEntry::make('addon_name')
                                                    ->label('Add-on')
                                                    ->formatStateUsing(fn (string $state, $record): string =>
                                                        ($record['quantity'] ?? 1) > 1 && $record['addon_key'] !== 'wd-extra-pages'
                                                            ? $state . ' × ' . $record['quantity']
                                                            : $state
                                                    ),
                                                TextEntry::make('total_price')
                                                    ->label('Price')
                                                    ->money(fn ($record): string => $record['currency'] ?? 'NGN'),
                                            ])
                                            ->columns(2),
                                    ])
                                    ->columns(4),
                            ]),
                        Section::make('Attribution')
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                TextEntry::make('source_page')
                                    ->label('Source page')
                                    ->placeholder('—'),
                                TextEntry::make('source_label')
                                    ->label('Source label')
                                    ->placeholder('—'),
                                TextEntry::make('terms_accepted_at')
                                    ->label('Terms accepted')
                                    ->dateTime(),
                                TextEntry::make('created_at')
                                    ->label('Received')
                                    ->dateTime(),
                            ]),
                    ]),
            ]);
    }
}
