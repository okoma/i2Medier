<?php

namespace App\Filament\Admin\Resources\HostingAccounts;

use App\Filament\Admin\Resources\HostingAccounts\Pages\CreateHostingAccount;
use App\Filament\Admin\Resources\HostingAccounts\Pages\EditHostingAccount;
use App\Filament\Admin\Resources\HostingAccounts\Pages\ListHostingAccounts;
use App\Filament\Admin\Resources\HostingAccounts\Pages\ViewHostingAccount;
use App\Filament\Admin\Resources\HostingAccounts\Schemas\HostingAccountForm;
use App\Filament\Admin\Resources\HostingAccounts\Schemas\HostingAccountInfolist;
use App\Filament\Admin\Resources\HostingAccounts\Tables\HostingAccountsTable;
use App\Models\HostingAccount;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HostingAccountResource extends Resource
{
    protected static ?string $model = HostingAccount::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServer;

    protected static ?string $navigationLabel = 'Hosting';

    protected static ?int $navigationSort = 21;

    public static function getNavigationGroup(): ?string
    {
        return 'Managed Services';
    }

    public static function form(Schema $schema): Schema
    {
        return HostingAccountForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HostingAccountInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HostingAccountsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListHostingAccounts::route('/'),
            'create' => CreateHostingAccount::route('/create'),
            'view'   => ViewHostingAccount::route('/{record}'),
            'edit'   => EditHostingAccount::route('/{record}/edit'),
        ];
    }
}
