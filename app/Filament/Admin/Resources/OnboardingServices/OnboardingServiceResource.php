<?php

namespace App\Filament\Admin\Resources\OnboardingServices;

use App\Filament\Admin\Resources\OnboardingServices\Pages\CreateOnboardingService;
use App\Filament\Admin\Resources\OnboardingServices\Pages\EditOnboardingService;
use App\Filament\Admin\Resources\OnboardingServices\Pages\ListOnboardingServices;
use App\Filament\Admin\Resources\OnboardingServices\Schemas\OnboardingServiceForm;
use App\Filament\Admin\Resources\OnboardingServices\Tables\OnboardingServicesTable;
use App\Models\OnboardingService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OnboardingServiceResource extends Resource
{
    protected static ?string $model = OnboardingService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationLabel = 'Services';

    protected static ?string $modelLabel = 'Onboarding Service';

    protected static ?string $pluralModelLabel = 'Onboarding Services';

    public static function form(Schema $schema): Schema
    {
        return OnboardingServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnboardingServicesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnboardingServices::route('/'),
            'create' => CreateOnboardingService::route('/create'),
            'edit' => EditOnboardingService::route('/{record}/edit'),
        ];
    }
}
