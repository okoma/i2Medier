<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions;

use App\Filament\Client\Resources\ServiceSubscriptions\Pages\CreateServiceSubscription;
use App\Filament\Client\Resources\ServiceSubscriptions\Pages\EditServiceSubscription;
use App\Filament\Client\Resources\ServiceSubscriptions\Pages\ListServiceSubscriptions;
use App\Filament\Client\Resources\ServiceSubscriptions\Pages\ViewServiceSubscription;
use App\Filament\Client\Resources\ServiceSubscriptions\Schemas\ServiceSubscriptionForm;
use App\Filament\Client\Resources\ServiceSubscriptions\Schemas\ServiceSubscriptionInfolist;
use App\Filament\Client\Resources\ServiceSubscriptions\Tables\ServiceSubscriptionsTable;
use App\Models\ServiceSubscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceSubscriptionResource extends Resource
{
    protected static ?string $model = ServiceSubscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 2;

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceSubscriptions::route('/'),
            'view' => ViewServiceSubscription::route('/{record}'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', auth()->user()?->client_id);
    }
}
