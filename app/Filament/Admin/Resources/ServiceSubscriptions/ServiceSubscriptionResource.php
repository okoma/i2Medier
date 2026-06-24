<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions;

use App\Filament\Admin\Resources\ServiceSubscriptions\Pages\CreateServiceSubscription;
use App\Filament\Admin\Resources\ServiceSubscriptions\Pages\EditServiceSubscription;
use App\Filament\Admin\Resources\ServiceSubscriptions\Pages\ListServiceSubscriptions;
use App\Filament\Admin\Resources\ServiceSubscriptions\Pages\ViewServiceSubscription;
use App\Filament\Admin\Resources\ServiceSubscriptions\RelationManagers\AddonSubscriptionsRelationManager;
use App\Filament\Admin\Resources\ServiceSubscriptions\Schemas\ServiceSubscriptionForm;
use App\Filament\Admin\Resources\ServiceSubscriptions\Schemas\ServiceSubscriptionInfolist;
use App\Filament\Admin\Resources\ServiceSubscriptions\Tables\ServiceSubscriptionsTable;
use App\Models\ServiceSubscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceSubscriptionResource extends Resource
{
    protected static ?string $model = ServiceSubscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?int $navigationSort = 6;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::query()
            ->where('status', 'pending')
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Pending service subscriptions';
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceSubscriptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceSubscriptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceSubscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AddonSubscriptionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceSubscriptions::route('/'),
            'create' => CreateServiceSubscription::route('/create'),
            'view' => ViewServiceSubscription::route('/{record}'),
            'edit' => EditServiceSubscription::route('/{record}/edit'),
        ];
    }
}
