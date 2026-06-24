<?php

namespace App\Filament\Client\Resources\Domains\Tables;

use App\Enums\DomainStatus;
use App\Models\Domain;
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
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('management_type')
                    ->label('Managed by')
                    ->badge()
                    ->sortable(),
                TextColumn::make('registrar')
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->date()
                    ->sortable()
                    ->description(fn (Domain $record): string => match (true) {
                        $record->daysUntilExpiry() === null      => '',
                        $record->daysUntilExpiry() < 0          => 'Expired',
                        $record->daysUntilExpiry() === 0         => 'Expires today',
                        $record->daysUntilExpiry() <= 30         => $record->daysUntilExpiry() . ' days left',
                        default                                  => '',
                    })
                    ->descriptionColor(fn (Domain $record): string => match (true) {
                        $record->daysUntilExpiry() !== null && $record->daysUntilExpiry() <= 30 => 'warning',
                        $record->daysUntilExpiry() !== null && $record->daysUntilExpiry() < 0  => 'danger',
                        default                                                                 => 'gray',
                    }),
                IconColumn::make('auto_renew')
                    ->label('Auto-Renew')
                    ->boolean()
                    ->trueIcon('heroicon-o-arrow-path')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('gray'),
                IconColumn::make('privacy_protected')
                    ->label('Privacy')
                    ->boolean()
                    ->trueIcon('heroicon-o-shield-check')
                    ->falseIcon('heroicon-o-shield-exclamation')
                    ->trueColor('success')
                    ->falseColor('gray'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(DomainStatus::class),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('expires_at', 'asc');
    }
}
