<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Pages;

use App\Filament\Admin\Resources\PortfolioProjects\PortfolioProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolioProject extends CreateRecord
{
    protected static string $resource = PortfolioProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (($data['status'] ?? null) === 'published' && blank($data['published_at'] ?? null)) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
