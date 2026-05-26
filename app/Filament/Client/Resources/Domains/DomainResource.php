<?php

namespace App\Filament\Client\Resources\Domains;

use App\Filament\Client\Resources\Domains\Pages\ListDomains;
use App\Filament\Client\Resources\Domains\Pages\ViewDomain;
use App\Filament\Client\Resources\Domains\Schemas\DomainInfolist;
use App\Filament\Client\Resources\Domains\Tables\DomainsTable;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DomainResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Domains';

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
            'view' => ViewDomain::route('/{record}'),
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
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $query = parent::getEloquentQuery()
            ->where('client_id', $user?->client_id)
            ->whereNotNull('primary_domain');

        if ($user?->isClientMember()) {
            $query->whereIn('id', $user->assignedWebsites()->pluck('websites.id'));
        }

        return $query;
    }
}
