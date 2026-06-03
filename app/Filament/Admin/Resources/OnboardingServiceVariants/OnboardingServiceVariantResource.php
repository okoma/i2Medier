<?php

namespace App\Filament\Admin\Resources\OnboardingServiceVariants;

use App\Filament\Admin\Resources\OnboardingServiceVariants\Pages\CreateOnboardingServiceVariant;
use App\Filament\Admin\Resources\OnboardingServiceVariants\Pages\EditOnboardingServiceVariant;
use App\Filament\Admin\Resources\OnboardingServiceVariants\Pages\ListOnboardingServiceVariants;
use App\Filament\Admin\Resources\OnboardingServiceVariants\Schemas\OnboardingServiceVariantForm;
use App\Filament\Admin\Resources\OnboardingServiceVariants\Tables\OnboardingServiceVariantsTable;
use App\Models\OnboardingServiceVariant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OnboardingServiceVariantResource extends Resource
{
    protected static ?string $model = OnboardingServiceVariant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Onboarding';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Service Variants';

    protected static ?string $modelLabel = 'Onboarding Service Variant';

    protected static ?string $pluralModelLabel = 'Onboarding Service Variants';

    public static function form(Schema $schema): Schema
    {
        return OnboardingServiceVariantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnboardingServiceVariantsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnboardingServiceVariants::route('/'),
            'create' => CreateOnboardingServiceVariant::route('/create'),
            'edit' => EditOnboardingServiceVariant::route('/{record}/edit'),
        ];
    }
}
