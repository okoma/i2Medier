<?php

namespace App\Filament\Admin\Resources\PortfolioCategories\Pages;

use App\Filament\Admin\Resources\PortfolioCategories\PortfolioCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioCategories extends ListRecords
{
    protected static string $resource = PortfolioCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
