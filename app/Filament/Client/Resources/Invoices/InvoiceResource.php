<?php

namespace App\Filament\Client\Resources\Invoices;

use App\Filament\Client\Resources\Invoices\Pages\CreateInvoice;
use App\Filament\Client\Resources\Invoices\Pages\EditInvoice;
use App\Filament\Client\Resources\Invoices\Pages\ListInvoices;
use App\Filament\Client\Resources\Invoices\RelationManagers\PaymentsRelationManager;
use App\Filament\Client\Resources\Invoices\Pages\ViewInvoice;
use App\Filament\Client\Resources\Invoices\Schemas\InvoiceForm;
use App\Filament\Client\Resources\Invoices\Schemas\InvoiceInfolist;
use App\Filament\Client\Resources\Invoices\Tables\InvoicesTable;
use App\Models\Invoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedReceiptPercent;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return InvoiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvoiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvoicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvoices::route('/'),
            'view' => ViewInvoice::route('/{record}'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', auth()->user()?->client_id);
    }
}
