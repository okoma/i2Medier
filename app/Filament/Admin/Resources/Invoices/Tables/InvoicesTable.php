<?php

namespace App\Filament\Admin\Resources\Invoices\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('total')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('due_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'sent' => 'Sent',
                        'paid' => 'Paid',
                        'overdue' => 'Overdue',
                        'cancelled' => 'Cancelled',
                        'refunded' => 'Refunded',
                    ]),
            ])
            ->recordActions([
                Action::make('share')
                    ->label('Share Link')
                    ->icon('heroicon-o-link')
                    ->url(fn ($record) => $record->publicPaymentUrl(), shouldOpenInNewTab: true),
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
