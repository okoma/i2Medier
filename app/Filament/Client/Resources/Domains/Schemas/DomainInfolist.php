<?php

namespace App\Filament\Client\Resources\Domains\Schemas;

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
                Grid::make(2)
                    ->schema([
                        Section::make('Domain Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('primary_domain')
                                    ->label('Domain'),
                                TextEntry::make('name')
                                    ->label('Website'),
                                TextEntry::make('domain_registrar')
                                    ->placeholder('Not set'),
                                TextEntry::make('domain_type')
                                    ->placeholder('Not set'),
                                TextEntry::make('domain_status')
                                    ->badge()
                                    ->placeholder('Unknown'),
                                TextEntry::make('domain_expiry_date')
                                    ->date()
                                    ->placeholder('Not set'),
                            ]),
                        Section::make('Website Context')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('staging_url')
                                    ->placeholder('No staging URL'),
                                TextEntry::make('health_state')
                                    ->badge(),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes added yet.'),
                            ]),
                    ]),
            ]);
    }
}
