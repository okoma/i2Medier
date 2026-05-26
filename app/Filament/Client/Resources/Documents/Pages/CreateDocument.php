<?php

namespace App\Filament\Client\Resources\Documents\Pages;

use App\Filament\Client\Resources\Documents\DocumentResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateDocument extends CreateRecord
{
    protected static string $resource = DocumentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data['client_id'] = $user->client_id;
        $data['uploaded_by'] = $user->id;
        $data['disk'] = 'public';
        $data['visibility'] = 'client';
        $data['is_client_upload'] = true;

        $path = $data['path'] ?? null;

        if (filled($path) && Storage::disk('public')->exists($path)) {
            $data['size'] = Storage::disk('public')->size($path);
            $data['mime_type'] = Storage::disk('public')->mimeType($path) ?: null;
            $data['extension'] = pathinfo($path, PATHINFO_EXTENSION) ?: null;
        }

        return $data;
    }
}
