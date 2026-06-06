<?php

namespace App\Filament\Admin\Resources\AffiliateProfiles;

use App\Filament\Admin\Resources\AffiliateProfiles\Pages\EditAffiliateProfile;
use App\Filament\Admin\Resources\AffiliateProfiles\Pages\ListAffiliateProfiles;
use App\Filament\Admin\Resources\AffiliateProfiles\Pages\ViewAffiliateProfile;
use App\Filament\Admin\Resources\AffiliateProfiles\RelationManagers\ReferralsRelationManager;
use App\Filament\Admin\Resources\AffiliateProfiles\Schemas\AffiliateProfileForm;
use App\Filament\Admin\Resources\AffiliateProfiles\Schemas\AffiliateProfileInfolist;
use App\Filament\Admin\Resources\AffiliateProfiles\Tables\AffiliateProfilesTable;
use App\Models\AffiliateProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AffiliateProfileResource extends Resource
{
    protected static ?string $model = AffiliateProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?int $navigationSort = 16;

    public static function form(Schema $schema): Schema
    {
        return AffiliateProfileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AffiliateProfileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AffiliateProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ReferralsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAffiliateProfiles::route('/'),
            'view' => ViewAffiliateProfile::route('/{record}'),
            'edit' => EditAffiliateProfile::route('/{record}/edit'),
        ];
    }
}
