<?php

namespace App\Filament\Admin\Resources\Documents\Pages;

use App\Filament\Admin\Resources\Documents\DocumentResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDocument extends ViewRecord
{
    protected static string $resource = DocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('open')
                ->label('Open File')
                ->color('gray')
                ->url(fn (): ?string => $this->record->downloadUrl(), shouldOpenInNewTab: true)
                ->visible(fn (): bool => filled($this->record->downloadUrl())),
            EditAction::make(),
        ];
    }
}
