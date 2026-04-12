<?php

namespace App\Filament\Admin\Resources\Addons;

use App\Filament\Admin\Resources\Addons\Pages\CreateAddon;
use App\Filament\Admin\Resources\Addons\Pages\EditAddon;
use App\Filament\Admin\Resources\Addons\Pages\ListAddons;
use App\Filament\Admin\Resources\Addons\Pages\ViewAddon;
use App\Filament\Admin\Resources\Addons\Schemas\AddonForm;
use App\Filament\Admin\Resources\Addons\Schemas\AddonInfolist;
use App\Filament\Admin\Resources\Addons\Tables\AddonsTable;
use App\Models\Addon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AddonResource extends Resource
{
    protected static ?string $model = Addon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|\UnitEnum|null $navigationGroup = 'Catalog';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return AddonForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AddonInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AddonsTable::configure($table);
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
            'index' => ListAddons::route('/'),
            'create' => CreateAddon::route('/create'),
            'view' => ViewAddon::route('/{record}'),
            'edit' => EditAddon::route('/{record}/edit'),
        ];
    }
}
