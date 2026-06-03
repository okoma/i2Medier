<?php

namespace App\Filament\Client\Resources\Documents\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Document Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('title'),
                                TextEntry::make('category')
                                    ->badge(),
                                TextEntry::make('folder')
                                    ->placeholder('No folder'),
                                TextEntry::make('created_at')
                                    ->dateTime(),
                            ]),
                        Section::make('File')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('original_name')
                                    ->label('File name'),
                                TextEntry::make('mime_type')
                                    ->placeholder('Unknown'),
                                TextEntry::make('extension')
                                    ->placeholder('Unknown'),
                                TextEntry::make('size')
                                    ->formatStateUsing(fn ($state, $record): string => $record->formattedSize()),
                                TextEntry::make('uploader.name')
                                    ->label('Uploaded by')
                                    ->placeholder('Unknown'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes added yet.'),
                            ]),
                    ]),
            ]);
    }
}
