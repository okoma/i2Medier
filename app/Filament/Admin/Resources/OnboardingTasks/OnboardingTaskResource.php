<?php

namespace App\Filament\Admin\Resources\OnboardingTasks;

use App\Filament\Admin\Resources\OnboardingTasks\Pages\CreateOnboardingTask;
use App\Filament\Admin\Resources\OnboardingTasks\Pages\EditOnboardingTask;
use App\Filament\Admin\Resources\OnboardingTasks\Pages\ListOnboardingTasks;
use App\Filament\Admin\Resources\OnboardingTasks\Pages\ViewOnboardingTask;
use App\Filament\Admin\Resources\OnboardingTasks\Schemas\OnboardingTaskForm;
use App\Filament\Admin\Resources\OnboardingTasks\Schemas\OnboardingTaskInfolist;
use App\Filament\Admin\Resources\OnboardingTasks\Tables\OnboardingTasksTable;
use App\Models\OnboardingTask;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OnboardingTaskResource extends Resource
{
    protected static ?string $model = OnboardingTask::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?int $navigationSort = 10;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::query()
            ->where('status', 'pending')
            ->whereNull('assigned_to')
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Unassigned pending onboarding tasks';
    }

    public static function form(Schema $schema): Schema
    {
        return OnboardingTaskForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OnboardingTaskInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnboardingTasksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnboardingTasks::route('/'),
            'create' => CreateOnboardingTask::route('/create'),
            'view' => ViewOnboardingTask::route('/{record}'),
            'edit' => EditOnboardingTask::route('/{record}/edit'),
        ];
    }
}
