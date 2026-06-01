<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EditBlogPost extends EditRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->url(fn (): string => URL::temporarySignedRoute(
                    'blog.preview',
                    now()->addHours(4),
                    ['post' => $this->getRecord()->slug]
                ))
                ->openUrlInNewTab(),
            Action::make('viewLive')
                ->label('View Live')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('gray')
                ->visible(fn (): bool => $this->getRecord()->status === 'published' && optional($this->getRecord()->published_at)->lte(now()))
                ->url(fn (): string => route('blog.show', [
                    'category' => $this->getRecord()->category?->slug ?? 'uncategorized',
                    'post'     => $this->getRecord(),
                ]))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug((string) ($data['title'] ?? ''));
        $data['content'] = is_array($data['content'] ?? null) ? $data['content'] : ['blocks' => []];

        return $data;
    }
}
