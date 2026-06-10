<?php

namespace App\Filament\Admin\Resources\Domains\Tables;

use App\Enums\DomainStatus;
use App\Models\Domain;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DomainsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('domain_name')
                    ->label('Domain')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('registrar')
                    ->placeholder('—'),
                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->date()
                    ->sortable()
                    ->description(fn (Domain $record): string => match (true) {
                        $record->daysUntilExpiry() === null    => '',
                        $record->daysUntilExpiry() < 0        => 'Expired',
                        $record->daysUntilExpiry() === 0      => 'Expires today',
                        $record->daysUntilExpiry() <= 30      => $record->daysUntilExpiry() . ' days left',
                        default                               => '',
                    }),
                IconColumn::make('auto_renew')
                    ->label('Auto-Renew')
                    ->boolean(),
                IconColumn::make('privacy_protected')
                    ->label('Privacy')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(DomainStatus::class),
                SelectFilter::make('client')
                    ->relationship('client', 'company_name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('expires_at', 'asc');
    }
}
