<?php

namespace App\Filament\Client\Resources\OnboardingTasks\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OnboardingTasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.reference')
                    ->label('Project')
                    ->searchable(),
                TextColumn::make('project.client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('due_at')
                    ->date()
                    ->sortable()
                    ->placeholder('No due date'),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
