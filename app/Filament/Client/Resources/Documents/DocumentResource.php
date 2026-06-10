<?php

namespace App\Filament\Client\Resources\Documents;

use App\Filament\Client\Resources\Documents\Pages\CreateDocument;
use App\Filament\Client\Resources\Documents\Pages\ListDocuments;
use App\Filament\Client\Resources\Documents\Pages\ViewDocument;
use App\Filament\Client\Resources\Documents\Schemas\DocumentForm;
use App\Filament\Client\Resources\Documents\Schemas\DocumentInfolist;
use App\Filament\Client\Resources\Documents\Tables\DocumentsTable;
use App\Models\Document;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationLabel = 'My Documents';

    public static function form(Schema $schema): Schema
    {
        return DocumentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DocumentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDocuments::route('/'),
            'create' => CreateDocument::route('/create'),
            'view' => ViewDocument::route('/{record}'),
        ];
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $query = parent::getEloquentQuery()
            ->where('client_id', $user?->client_id)
            ->where('visibility', 'client');

        return $query->latest();
    }
}
