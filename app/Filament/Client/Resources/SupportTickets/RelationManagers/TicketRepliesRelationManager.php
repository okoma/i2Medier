<?php

namespace App\Filament\Client\Resources\SupportTickets\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketRepliesRelationManager extends RelationManager
{
    protected static string $relationship = 'replies';

    protected static ?string $title = 'Replies';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('body')
                ->label('Reply')
                ->required()
                ->rows(6),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->where('is_internal', false)->with('author'))
            ->columns([
                TextColumn::make('author.name')
                    ->label('Author')
                    ->placeholder('Unknown'),
                TextColumn::make('body')
                    ->wrap(),
                IconColumn::make('is_internal')
                    ->label('Internal')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->since(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Add Reply')
                    ->mutateDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        $data['is_internal'] = false;

                        return $data;
                    }),
            ]);
    }
}
