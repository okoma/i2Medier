<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use App\Models\BlogPost;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('previewDraft')
                ->label('Save Draft & Preview')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->action(function (): void {
                    $data = $this->form->getState();
                    $data['author_id'] = Auth::id();
                    $data['status'] = 'draft';
                    $data['slug'] = filled($data['slug'] ?? null)
                        ? $data['slug']
                        : Str::slug((string) ($data['title'] ?? ''));
                    $data['content'] = is_array($data['content'] ?? null)
                        ? $data['content']
                        : ['blocks' => []];

                    $record = BlogPost::create($data);

                    $previewUrl = URL::temporarySignedRoute(
                        'blog.preview',
                        now()->addHours(4),
                        ['post' => $record->slug]
                    );

                    $this->js('window.open(' . json_encode($previewUrl) . ', \'_blank\')');

                    $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
                }),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = $data['author_id'] ?? Auth::id();
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug((string) ($data['title'] ?? ''));
        $data['content'] = is_array($data['content'] ?? null) ? $data['content'] : ['blocks' => []];

        if (($data['status'] ?? null) === 'published' && blank($data['published_at'] ?? null)) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
