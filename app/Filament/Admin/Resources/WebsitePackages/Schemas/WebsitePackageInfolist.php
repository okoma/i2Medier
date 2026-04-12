<?php

namespace App\Filament\Admin\Resources\WebsitePackages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class WebsitePackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Package')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('slug'),
                                TextEntry::make('description'),
                                TextEntry::make('price')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('is_featured')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Featured' : 'Standard'),
                            ]),
                        Section::make('Usage')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('websites_count')
                                    ->state(fn ($record): int => $record->websites()->count())
                                    ->label('Provisioned Websites'),
                                TextEntry::make('items_count')
                                    ->state(fn ($record): int => $record->items()->count())
                                    ->label('Package Items'),
                                TextEntry::make('features')
                                    ->formatStateUsing(fn (?array $state): string => filled($state) ? implode(', ', $state) : 'None'),
                                TextEntry::make('is_active')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Inactive'),
                            ]),
                        Section::make('Package Preview')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('items_preview')
                                    ->label('Included Items')
                                    ->html()
                                    ->state(function ($record): string {
                                        $record->loadMissing('items.itemable');

                                        if ($record->items->isEmpty()) {
                                            return '<span class="text-sm text-gray-500">No items configured yet.</span>';
                                        }

                                        return $record->items
                                            ->map(function ($item): string {
                                                $name = e($item->itemable?->name ?? 'Unknown item');
                                                $type = class_basename($item->itemable_type);
                                                $optional = $item->is_optional ? 'Optional' : 'Included';

                                                return "<div><strong>{$name}</strong> <span class=\"text-xs text-gray-500\">({$type}, qty {$item->quantity}, {$optional})</span></div>";
                                            })
                                            ->implode('');
                                    }),
                            ]),
                    ]),
            ]);
    }
}
