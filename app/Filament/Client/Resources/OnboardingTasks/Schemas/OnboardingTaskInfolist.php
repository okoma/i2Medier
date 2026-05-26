<?php

namespace App\Filament\Client\Resources\OnboardingTasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OnboardingTaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Task Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('website.name')
                                    ->label('Website'),
                                TextEntry::make('title'),
                                TextEntry::make('description')
                                    ->columnSpanFull()
                                    ->placeholder('No description added yet.'),
                                TextEntry::make('type')
                                    ->badge(),
                                TextEntry::make('status')
                                    ->badge(),
                            ]),
                        Section::make('Timeline')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('assignee.name')
                                    ->label('Assigned to')
                                    ->placeholder('Not assigned'),
                                TextEntry::make('due_at')
                                    ->date()
                                    ->placeholder('No due date'),
                                TextEntry::make('completed_at')
                                    ->dateTime()
                                    ->placeholder('Still in progress'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes yet.'),
                            ]),
                    ]),
            ]);
    }
}
