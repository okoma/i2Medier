<?php

namespace App\Filament\Client\Resources\Domains;

use App\Filament\Client\Resources\Domains\Pages\ListDomains;
use App\Filament\Client\Resources\Domains\Pages\ViewDomain;
use App\Filament\Client\Resources\Domains\Schemas\DomainInfolist;
use App\Filament\Client\Resources\Domains\Tables\DomainsTable;
use App\Models\Domain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DomainResource extends Resource
{
    protected static ?string $model = Domain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static ?string $navigationLabel = 'Domains';

    protected static ?int $navigationSort = 7;

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
            'index' => ListDomains::route('/'),
            'view'  => ViewDomain::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', Auth::user()?->client_id);
    }
}
