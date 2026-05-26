<?php

namespace App\Filament\Client\Resources\Hosting;

use App\Filament\Client\Resources\Hosting\Pages\ListHosting;
use App\Filament\Client\Resources\Hosting\Pages\ViewHosting;
use App\Filament\Client\Resources\Hosting\Schemas\HostingInfolist;
use App\Filament\Client\Resources\Hosting\Tables\HostingTable;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HostingResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServerStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Hosting';

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
            'view' => ViewHosting::route('/{record}'),
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
            ->where(function (Builder $hostingQuery): void {
                $hostingQuery
                    ->whereNotNull('hosting_provider')
                    ->orWhereNotNull('hosting_status')
                    ->orWhereNotNull('hosting_expiry_date');
            });

        if ($user?->isClientMember()) {
            $query->whereIn('id', $user->assignedWebsites()->pluck('websites.id'));
        }

        return $query;
    }
}
