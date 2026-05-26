<?php

namespace App\Filament\Admin\Resources\AffiliateProfiles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AffiliateProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Affiliate Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('client.company_name')
                                    ->label('Client'),
                                TextEntry::make('user.name')
                                    ->label('Owner'),
                                TextEntry::make('referral_code'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('commission_rate')
                                    ->suffix('%'),
                            ]),
                        Section::make('Payout Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('payout_email')
                                    ->placeholder('Not set'),
                                TextEntry::make('payout_bank_name')
                                    ->placeholder('Not set'),
                                TextEntry::make('payout_account_name')
                                    ->placeholder('Not set'),
                                TextEntry::make('payout_account_number')
                                    ->placeholder('Not set'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes added yet.'),
                            ]),
                    ]),
            ]);
    }
}
