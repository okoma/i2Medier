<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class ServiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Service')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('slug'),
                                TextEntry::make('type')->badge(),
                                TextEntry::make('description'),
                            ]),
                        Section::make('Billing')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('billing_type')->badge(),
                                TextEntry::make('billing_cycle')->badge(),
                                TextEntry::make('price')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('is_core')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Core' : 'Optional'),
                                TextEntry::make('is_active')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Inactive'),
                            ]),
                    ]),
            ]);
    }
}
