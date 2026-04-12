<?php

namespace App\Filament\Admin\Resources\WebsitePackages\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WebsitesRelationManager extends RelationManager
{
    protected static string $relationship = 'websites';

    protected static ?string $title = 'Provisioned Websites';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('primary_domain')
                    ->label('Domain'),
                TextColumn::make('health_state')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
