<?php

namespace App\Filament\Admin\Resources\WebsitePackages\RelationManagers;

use App\Models\Addon;
use App\Models\Service;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Package Items';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([
                Select::make('itemable_type')
                    ->options([
                        Service::class => 'Service',
                        Addon::class => 'Addon',
                    ])
                    ->live()
                    ->required(),
                Select::make('itemable_id')
                    ->label('Item')
                    ->options(function (Get $get): array {
                        return match ($get('itemable_type')) {
                            Service::class => Service::query()->orderBy('name')->pluck('name', 'id')->all(),
                            Addon::class => Addon::query()->orderBy('name')->pluck('name', 'id')->all(),
                            default => [],
                        };
                    })
                    ->searchable()
                    ->required(),
                TextInput::make('quantity')
                    ->numeric()
                    ->default(1)
                    ->required(),
                Toggle::make('is_optional')
                    ->default(false),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('itemable.name')
                    ->label('Item')
                    ->searchable(),
                TextColumn::make('itemable_type')
                    ->label('Type')
                    ->formatStateUsing(fn (string $state): string => class_basename($state))
                    ->badge(),
                TextColumn::make('quantity'),
                TextColumn::make('is_optional')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Optional' : 'Included'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
