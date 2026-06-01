<?php

namespace App\Filament\Admin\Resources\PortfolioCategories\Pages;

use App\Filament\Admin\Resources\PortfolioCategories\PortfolioCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolioCategory extends CreateRecord
{
    protected static string $resource = PortfolioCategoryResource::class;
}
