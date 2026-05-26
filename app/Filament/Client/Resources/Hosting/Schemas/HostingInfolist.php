<?php

namespace App\Filament\Client\Resources\Hosting\Schemas;

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
                Grid::make(2)
                    ->schema([
                        Section::make('Hosting Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Website'),
                                TextEntry::make('primary_domain')
                                    ->label('Domain')
                                    ->placeholder('Not connected'),
                                TextEntry::make('hosting_provider')
                                    ->placeholder('Not set'),
                                TextEntry::make('hosting_type')
                                    ->placeholder('Not set'),
                                TextEntry::make('hosting_server')
                                    ->placeholder('Not set'),
                                TextEntry::make('hosting_status')
                                    ->badge()
                                    ->placeholder('Unknown'),
                                TextEntry::make('hosting_expiry_date')
                                    ->date()
                                    ->placeholder('Not set'),
                            ]),
                        Section::make('Security & Access')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('ssl_provider')
                                    ->placeholder('Not set'),
                                TextEntry::make('ssl_status')
                                    ->badge()
                                    ->placeholder('Unknown'),
                                TextEntry::make('ssl_expiry_date')
                                    ->date()
                                    ->placeholder('Not set'),
                                TextEntry::make('cms_admin_url')
                                    ->placeholder('Not shared'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes added yet.'),
                            ]),
                    ]),
            ]);
    }
}
