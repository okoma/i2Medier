<?php

namespace App\Filament\Client\Resources\Hosting;

use App\Filament\Client\Resources\Hosting\Pages\ListHosting;
use App\Filament\Client\Resources\Hosting\Pages\ViewHosting;
use App\Filament\Client\Resources\Hosting\Schemas\HostingInfolist;
use App\Filament\Client\Resources\Hosting\Tables\HostingTable;
use App\Models\HostingAccount;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HostingResource extends Resource
{
    protected static ?string $model = HostingAccount::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServer;

    protected static ?string $navigationLabel = 'Hosting';

    protected static ?string $slug = 'hosting';

    protected static ?int $navigationSort = 8;

    public static function infolist(Schema $schema): Schema
    {
        return HostingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HostingTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHosting::route('/'),
            'view'  => ViewHosting::route('/{record}'),
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
