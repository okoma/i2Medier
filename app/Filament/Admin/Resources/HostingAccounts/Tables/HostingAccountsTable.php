<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Tables;

use App\Enums\HostingStatus;
use App\Models\HostingAccount;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class HostingAccountsTable
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
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('primary_domain')
                    ->label('Domain')
                    ->placeholder('—'),
                TextColumn::make('status')
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
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(HostingStatus::class),
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
