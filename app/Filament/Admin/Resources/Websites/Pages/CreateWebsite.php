<?php

namespace App\Filament\Admin\Resources\Websites\Pages;

use App\Filament\Admin\Resources\Websites\WebsiteResource;
use App\Models\Website;
use App\Support\PackageProvisioner;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsite extends CreateRecord
{
    protected static string $resource = WebsiteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['health_state_changed_at'] = now();

        return $data;
    }

    protected function afterCreate(): void
    {
        /** @var Website $website */
        $website = $this->getRecord();

        if ($website->package_id) {
            PackageProvisioner::provision($website);
        }
    }
}
