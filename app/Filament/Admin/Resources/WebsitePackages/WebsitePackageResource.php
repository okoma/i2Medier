<?php

namespace App\Filament\Admin\Resources\WebsitePackages;

use App\Filament\Admin\Resources\WebsitePackages\Pages\CreateWebsitePackage;
use App\Filament\Admin\Resources\WebsitePackages\Pages\EditWebsitePackage;
use App\Filament\Admin\Resources\WebsitePackages\Pages\ListWebsitePackages;
use App\Filament\Admin\Resources\WebsitePackages\Pages\ViewWebsitePackage;
use App\Filament\Admin\Resources\WebsitePackages\RelationManagers\ItemsRelationManager;
use App\Filament\Admin\Resources\WebsitePackages\RelationManagers\WebsitesRelationManager;
use App\Filament\Admin\Resources\WebsitePackages\Schemas\WebsitePackageForm;
use App\Filament\Admin\Resources\WebsitePackages\Schemas\WebsitePackageInfolist;
use App\Filament\Admin\Resources\WebsitePackages\Tables\WebsitePackagesTable;
use App\Models\WebsitePackage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebsitePackageResource extends Resource
{
    protected static ?string $model = WebsitePackage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static string|\UnitEnum|null $navigationGroup = 'Catalog';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return WebsitePackageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WebsitePackageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsitePackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
            WebsitesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebsitePackages::route('/'),
            'create' => CreateWebsitePackage::route('/create'),
            'view' => ViewWebsitePackage::route('/{record}'),
            'edit' => EditWebsitePackage::route('/{record}/edit'),
        ];
    }
}
