<?php

namespace App\Filament\Admin\Resources\Websites\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class WebsiteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Website')
                            ->schema([
                                TextEntry::make('client.company_name')
                                    ->label('Client'),
                                TextEntry::make('package.name')
                                    ->label('Package'),
                                TextEntry::make('name'),
                                TextEntry::make('primary_domain'),
                                TextEntry::make('staging_url'),
                                TextEntry::make('cms')
                                    ->badge(),
                                TextEntry::make('health_state')
                                    ->badge(),
                            ]),
                        Section::make('Infrastructure')
                            ->schema([
                                TextEntry::make('hosting_provider'),
                                TextEntry::make('hosting_status')->badge(),
                                TextEntry::make('hosting_expiry_date')->date(),
                                TextEntry::make('domain_registrar'),
                                TextEntry::make('domain_status')->badge(),
                                TextEntry::make('domain_expiry_date')->date(),
                                TextEntry::make('ssl_provider'),
                                TextEntry::make('ssl_status')->badge(),
                                TextEntry::make('ssl_expiry_date')->date(),
                            ]),
                    ]),
            ]);
    }
}
