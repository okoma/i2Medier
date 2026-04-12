<?php

namespace App\Filament\Admin\Resources\Websites;

use App\Filament\Admin\Resources\Websites\Pages\CreateWebsite;
use App\Filament\Admin\Resources\Websites\Pages\EditWebsite;
use App\Filament\Admin\Resources\Websites\Pages\ListWebsites;
use App\Filament\Admin\Resources\Websites\Pages\ViewWebsite;
use App\Filament\Admin\Resources\Websites\Schemas\WebsiteForm;
use App\Filament\Admin\Resources\Websites\Schemas\WebsiteInfolist;
use App\Filament\Admin\Resources\Websites\Tables\WebsitesTable;
use App\Models\Website;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string|\UnitEnum|null $navigationGroup = 'Operations';

    protected static ?int $navigationSort = 2;

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
            'create' => CreateWebsite::route('/create'),
            'view' => ViewWebsite::route('/{record}'),
            'edit' => EditWebsite::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
