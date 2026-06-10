<?php

namespace App\Filament\Client\Resources\OnboardingTasks;

use App\Filament\Client\Resources\OnboardingTasks\Pages\ListOnboardingTasks;
use App\Filament\Client\Resources\OnboardingTasks\Pages\ViewOnboardingTask;
use App\Filament\Client\Resources\OnboardingTasks\Schemas\OnboardingTaskInfolist;
use App\Filament\Client\Resources\OnboardingTasks\Tables\OnboardingTasksTable;
use App\Models\OnboardingTask;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OnboardingTaskResource extends Resource
{
    protected static ?string $model = OnboardingTask::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Onboarding';

    protected static ?int $navigationSort = 2;

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();

        return OnboardingTask::query()
            ->whereHas('project', fn ($q) => $q->where('client_id', $user?->client_id))
            ->where('status', '!=', 'completed')
            ->exists();
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
            'view' => ViewOnboardingTask::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        $user = Auth::user();

        return OnboardingTask::query()
            ->whereHas('project', fn ($q) => $q->where('client_id', $user?->client_id))
            ->exists();
    }

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();

        $query = parent::getEloquentQuery()
            ->with(['project.client', 'assignee'])
            ->whereHas('project', fn (Builder $projectQuery) => $projectQuery->where('client_id', $user?->client_id));

        return $query->orderBy('status')->orderBy('sort_order')->orderBy('due_at');
    }
}
