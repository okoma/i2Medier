<?php

namespace App\Filament\Admin\Resources\OnboardingAddons;

use App\Filament\Admin\Resources\OnboardingAddons\Pages\CreateOnboardingAddon;
use App\Filament\Admin\Resources\OnboardingAddons\Pages\EditOnboardingAddon;
use App\Filament\Admin\Resources\OnboardingAddons\Pages\ListOnboardingAddons;
use App\Filament\Admin\Resources\OnboardingAddons\Schemas\OnboardingAddonForm;
use App\Filament\Admin\Resources\OnboardingAddons\Tables\OnboardingAddonsTable;
use App\Models\OnboardingAddon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OnboardingAddonResource extends Resource
{
    protected static ?string $model = OnboardingAddon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPlusCircle;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationLabel = 'Add-ons';

    protected static ?string $modelLabel = 'Onboarding Add-on';

    protected static ?string $pluralModelLabel = 'Onboarding Add-ons';

    public static function form(Schema $schema): Schema
    {
        return OnboardingAddonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnboardingAddonsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnboardingAddons::route('/'),
            'create' => CreateOnboardingAddon::route('/create'),
            'edit' => EditOnboardingAddon::route('/{record}/edit'),
        ];
    }
}
