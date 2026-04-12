<?php

namespace App\Filament\Admin\Resources\BlogPosts\Pages;

use App\Filament\Admin\Resources\BlogPosts\BlogPostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = $data['author_id'] ?? Auth::id();
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug((string) ($data['title'] ?? ''));

        if (($data['status'] ?? null) === 'published' && blank($data['published_at'] ?? null)) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
