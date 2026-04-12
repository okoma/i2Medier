<?php

namespace App\Filament\Client\Resources\Websites;

use App\Filament\Client\Resources\Websites\Pages\CreateWebsite;
use App\Filament\Client\Resources\Websites\Pages\EditWebsite;
use App\Filament\Client\Resources\Websites\Pages\ListWebsites;
use App\Filament\Client\Resources\Websites\Pages\ViewWebsite;
use App\Filament\Client\Resources\Websites\Schemas\WebsiteForm;
use App\Filament\Client\Resources\Websites\Schemas\WebsiteInfolist;
use App\Filament\Client\Resources\Websites\Tables\WebsitesTable;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return WebsiteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WebsiteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsitesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebsites::route('/'),
            'view' => ViewWebsite::route('/{record}'),
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

        $query = parent::getEloquentQuery()->where('client_id', $user?->client_id);

        if ($user?->isClientMember()) {
            $query->whereIn('id', $user->assignedWebsites()->pluck('websites.id'));
        }

        return $query;
    }
}
