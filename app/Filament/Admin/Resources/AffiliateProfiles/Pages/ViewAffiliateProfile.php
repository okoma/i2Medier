<?php

namespace App\Filament\Admin\Resources\AffiliateProfiles\Pages;

use App\Filament\Admin\Resources\AffiliateProfiles\AffiliateProfileResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAffiliateProfile extends ViewRecord
{
    protected static string $resource = AffiliateProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
