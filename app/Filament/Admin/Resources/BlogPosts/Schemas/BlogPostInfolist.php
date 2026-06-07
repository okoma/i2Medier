<?php

namespace App\Filament\Admin\Resources\BlogPosts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class BlogPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Overview')
                            ->columnSpan(2)
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('slug'),
                                TextEntry::make('excerpt')
                                    ->columnSpanFull(),
                                TextEntry::make('body')
                                    ->html()
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Publishing')
                            ->schema([
                                TextEntry::make('category.name')
                                    ->label('Category'),
                                TextEntry::make('author.name')
                                    ->label('Author'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('published_at')
                                    ->dateTime(),
                                TextEntry::make('is_featured')
                                    ->badge()
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Featured' : 'Standard'),
                                TextEntry::make('read_time')
                                    ->suffix(' min'),
                                TextEntry::make('view_count'),
                                TextEntry::make('share_count')
                                    ->label('Shares'),
                                ImageEntry::make('featured_image'),
                            ]),
                    ]),
            ]);
    }
}
