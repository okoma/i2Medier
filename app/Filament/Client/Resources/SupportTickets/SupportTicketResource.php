<?php

namespace App\Filament\Client\Resources\SupportTickets;

use App\Filament\Client\Resources\SupportTickets\Pages\CreateSupportTicket;
use App\Filament\Client\Resources\SupportTickets\Pages\EditSupportTicket;
use App\Filament\Client\Resources\SupportTickets\Pages\ListSupportTickets;
use App\Filament\Client\Resources\SupportTickets\RelationManagers\TicketRepliesRelationManager;
use App\Filament\Client\Resources\SupportTickets\Pages\ViewSupportTicket;
use App\Filament\Client\Resources\SupportTickets\Schemas\SupportTicketForm;
use App\Filament\Client\Resources\SupportTickets\Schemas\SupportTicketInfolist;
use App\Filament\Client\Resources\SupportTickets\Tables\SupportTicketsTable;
use App\Models\SupportTicket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SupportTicketResource extends Resource
{
    protected static ?string $model = SupportTicket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return SupportTicketForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SupportTicketInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SupportTicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TicketRepliesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSupportTickets::route('/'),
            'create' => CreateSupportTicket::route('/create'),
            'view' => ViewSupportTicket::route('/{record}'),
        ];
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $query = parent::getEloquentQuery()->where('client_id', $user?->client_id);

        if ($user?->isClientMember()) {
            $query->where('submitted_by', $user->id);
        }

        return $query;
    }
}
