<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class PortfolioProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Project')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('slug'),
                                TextEntry::make('type')->badge(),
                                TextEntry::make('client_name'),
                                TextEntry::make('summary'),
                                TextEntry::make('description')
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Publishing')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('status')->badge(),
                                TextEntry::make('published_at')->dateTime(),
                                TextEntry::make('is_featured')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Featured' : 'Standard'),
                                TextEntry::make('project_url'),
                                TextEntry::make('tech_stack')
                                    ->formatStateUsing(fn (?array $state): string => filled($state) ? implode(', ', $state) : 'None'),
                            ]),
                    ]),
            ]);
    }
}
