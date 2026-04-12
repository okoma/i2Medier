<?php

namespace App\Filament\Admin\Resources\Clients\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Client')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('company_name'),
                                TextEntry::make('contact_name'),
                                TextEntry::make('email'),
                                TextEntry::make('phone'),
                                TextEntry::make('whatsapp_number'),
                                TextEntry::make('status')
                                    ->badge(),
                            ]),
                        Section::make('Account Overview')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('country'),
                                TextEntry::make('state'),
                                TextEntry::make('city'),
                                TextEntry::make('address'),
                                TextEntry::make('websites_count')
                                    ->state(fn ($record): int => $record->websites()->count())
                                    ->label('Websites'),
                                TextEntry::make('invoices_count')
                                    ->state(fn ($record): int => $record->invoices()->count())
                                    ->label('Invoices'),
                            ]),
                    ]),
            ]);
    }
}
