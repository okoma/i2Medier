<?php

namespace App\Filament\Client\Resources\Hosting\Tables;

use App\Enums\HostingStatus;
use App\Models\HostingAccount;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class HostingTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Plan')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->description(fn (HostingAccount $record): string => $record->type?->getLabel() ?? ''),
                TextColumn::make('primary_domain')
                    ->label('Domain')
                    ->placeholder('—')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('management_type')
                    ->label('Managed by')
                    ->badge()
                    ->sortable(),
                TextColumn::make('server_location')
                    ->label('Location')
                    ->placeholder('—'),
                TextColumn::make('expires_at')
                    ->label('Renewal')
                    ->date()
                    ->sortable()
                    ->description(fn (HostingAccount $record): string => match (true) {
                        $record->daysUntilExpiry() === null    => '',
                        $record->daysUntilExpiry() < 0        => 'Expired',
                        $record->daysUntilExpiry() === 0      => 'Expires today',
                        $record->daysUntilExpiry() <= 30      => $record->daysUntilExpiry() . ' days left',
                        default                               => '',
                    })
                    ->descriptionColor(fn (HostingAccount $record): string => match (true) {
                        $record->daysUntilExpiry() !== null && $record->daysUntilExpiry() <= 30 => 'warning',
                        $record->daysUntilExpiry() !== null && $record->daysUntilExpiry() < 0  => 'danger',
                        default                                                                 => 'gray',
                    }),
                TextColumn::make('price')
                    ->formatStateUsing(fn (HostingAccount $record): string => $record->formattedPrice())
                    ->placeholder('—'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(HostingStatus::class),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('expires_at', 'asc');
    }
}
