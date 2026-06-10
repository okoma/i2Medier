<?php

namespace App\Filament\Admin\Resources\Domains;

use App\Filament\Admin\Resources\Domains\Pages\CreateDomain;
use App\Filament\Admin\Resources\Domains\Pages\EditDomain;
use App\Filament\Admin\Resources\Domains\Pages\ListDomains;
use App\Filament\Admin\Resources\Domains\Pages\ViewDomain;
use App\Filament\Admin\Resources\Domains\Schemas\DomainForm;
use App\Filament\Admin\Resources\Domains\Schemas\DomainInfolist;
use App\Filament\Admin\Resources\Domains\Tables\DomainsTable;
use App\Models\Domain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DomainResource extends Resource
{
    protected static ?string $model = Domain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static ?string $navigationLabel = 'Domains';

    protected static ?int $navigationSort = 20;

    public static function getNavigationGroup(): ?string
    {
        return 'Managed Services';
    }

    public static function form(Schema $schema): Schema
    {
        return DomainForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DomainInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DomainsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListDomains::route('/'),
            'create' => CreateDomain::route('/create'),
            'view'   => ViewDomain::route('/{record}'),
            'edit'   => EditDomain::route('/{record}/edit'),
        ];
    }
}
