<?php

namespace App\Filament\Admin\Resources\Documents\Pages;

use App\Filament\Admin\Resources\Documents\DocumentResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditDocument extends EditRecord
{
    protected static string $resource = DocumentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $disk = $data['disk'] ?? 'public';
        $path = $data['path'] ?? null;

        if (filled($path) && Storage::disk($disk)->exists($path)) {
            $data['size'] = Storage::disk($disk)->size($path);
            $data['mime_type'] = Storage::disk($disk)->mimeType($path) ?: $data['mime_type'] ?? null;
            $data['extension'] = pathinfo($path, PATHINFO_EXTENSION) ?: null;
        }

        return $data;
    }
}
