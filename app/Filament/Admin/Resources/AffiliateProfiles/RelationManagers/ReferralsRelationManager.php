<?php

namespace App\Filament\Admin\Resources\AffiliateProfiles\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ReferralsRelationManager extends RelationManager
{
    protected static string $relationship = 'referrals';

    protected static ?string $title = 'Referrals';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('referral_id')
                ->default('REF-' . Str::upper(Str::random(6)))
                ->required(),
            TextInput::make('referred_domain')
                ->required()
                ->maxLength(255),
            TextInput::make('product_name')
                ->required()
                ->maxLength(255),
            TextInput::make('order_amount')
                ->numeric()
                ->default(0)
                ->required(),
            TextInput::make('commission_amount')
                ->numeric()
                ->default(0)
                ->required(),
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'paid' => 'Paid',
                    'rejected' => 'Rejected',
                ])
                ->default('pending')
                ->required(),
            DatePicker::make('referred_at'),
            DatePicker::make('paid_at'),
            Textarea::make('notes')
                ->rows(4),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('referral_id')
                    ->searchable(),
                TextColumn::make('referred_domain')
                    ->searchable(),
                TextColumn::make('product_name')
                    ->searchable(),
                TextColumn::make('commission_amount')
                    ->money('NGN'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('referred_at')
                    ->date(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
