<?php

namespace App\Filament\Admin\Resources\Websites\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class WebsitesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('package.name')
                    ->label('Package'),
                TextColumn::make('primary_domain')
                    ->searchable(),
                TextColumn::make('health_state')
                    ->badge()
                    ->sortable(),
                TextColumn::make('domain_status')
                    ->badge(),
                TextColumn::make('ssl_status')
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('health_state')
                    ->options([
                        'pending_setup' => 'Pending Setup',
                        'active' => 'Active',
                        'at_risk' => 'At Risk',
                        'suspended' => 'Suspended',
                        'archived' => 'Archived',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
