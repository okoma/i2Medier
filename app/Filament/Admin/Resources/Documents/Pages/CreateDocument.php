<?php

namespace App\Filament\Admin\Resources\Documents\Pages;

use App\Filament\Admin\Resources\Documents\DocumentResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateDocument extends CreateRecord
{
    protected static string $resource = DocumentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->hydrateFileMetadata($data);
    }

    protected function hydrateFileMetadata(array $data): array
    {
        $disk = $data['disk'] ?? 'public';
        $path = $data['path'] ?? null;

        if (filled($path) && Storage::disk($disk)->exists($path)) {
            $data['size'] = Storage::disk($disk)->size($path);
            $data['mime_type'] = Storage::disk($disk)->mimeType($path) ?: $data['mime_type'] ?? null;
            $data['extension'] = pathinfo($path, PATHINFO_EXTENSION) ?: null;
        }

        $data['uploaded_by'] = auth()->id();

        return $data;
    }
}
