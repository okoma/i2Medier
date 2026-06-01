<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Pages;

use App\Filament\Admin\Resources\PortfolioProjects\PortfolioProjectResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\URL;

class EditPortfolioProject extends EditRecord
{
    protected static string $resource = PortfolioProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->url(fn (): string => URL::temporarySignedRoute(
                    'portfolio.preview',
                    now()->addHours(4),
                    ['portfolioProject' => $this->getRecord()->slug]
                ))
                ->openUrlInNewTab(),
            Action::make('viewLive')
                ->label('View Live')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->visible(fn (): bool => $this->getRecord()->status === 'published' &&
                    ($this->getRecord()->published_at === null || $this->getRecord()->published_at->lte(now())))
                ->url(fn (): string => route('portfolio.show', $this->getRecord()))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['content'] = is_array($data['content'] ?? null) ? $data['content'] : ['blocks' => []];

        return $data;
    }
}
