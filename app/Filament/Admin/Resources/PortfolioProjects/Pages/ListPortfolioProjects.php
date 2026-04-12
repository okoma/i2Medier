<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Pages;

use App\Filament\Admin\Resources\PortfolioProjects\PortfolioProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioProjects extends ListRecords
{
    protected static string $resource = PortfolioProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
