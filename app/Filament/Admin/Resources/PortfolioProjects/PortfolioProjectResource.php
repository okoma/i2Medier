<?php

namespace App\Filament\Admin\Resources\PortfolioProjects;

use App\Filament\Admin\Resources\PortfolioProjects\Pages\CreatePortfolioProject;
use App\Filament\Admin\Resources\PortfolioProjects\Pages\EditPortfolioProject;
use App\Filament\Admin\Resources\PortfolioProjects\Pages\ListPortfolioProjects;
use App\Filament\Admin\Resources\PortfolioProjects\Schemas\PortfolioProjectForm;
use App\Filament\Admin\Resources\PortfolioProjects\Tables\PortfolioProjectsTable;
use App\Models\PortfolioProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PortfolioProjectResource extends Resource
{
    protected static ?string $model = PortfolioProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string|\UnitEnum|null $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return PortfolioProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortfolioProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListPortfolioProjects::route('/'),
            'create' => CreatePortfolioProject::route('/create'),
            'edit'   => EditPortfolioProject::route('/{record}/edit'),
        ];
    }
}
