<?php

namespace App\Filament\Client\Widgets\AffiliateCenter;

use App\Models\AffiliateProfile;
use App\Models\AffiliateReferral;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ReferralsTableWidget extends TableWidget
{
    protected static ?string $heading = 'Referrals';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('id')
                    ->label('Ref #')
                    ->formatStateUsing(fn (int $state): string => '#R' . $state)
                    ->fontFamily('mono'),
                TextColumn::make('referred_domain')
                    ->label('Domain')
                    ->searchable()
                    ->placeholder('—'),
                TextColumn::make('product_name')
                    ->label('Product')
                    ->searchable()
                    ->placeholder('—'),
                TextColumn::make('order_amount')
                    ->label('Order')
                    ->money('NGN'),
                TextColumn::make('commission_amount')
                    ->label('Commission')
                    ->money('NGN'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid'      => 'success',
                        'pending'   => 'warning',
                        'cancelled' => 'danger',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('referred_at')
                    ->label('Date')
                    ->date()
                    ->sortable()
                    ->placeholder('—'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'paid'      => 'Paid',
                        'pending'   => 'Pending',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->defaultSort('referred_at', 'desc');
    }

    protected function getTableQuery(): Builder
    {
        $profileId = AffiliateProfile::where('user_id', auth()->id())->value('id');

        if (! $profileId) {
            return AffiliateReferral::query()->whereRaw('1 = 0');
        }

        return AffiliateReferral::query()->where('affiliate_profile_id', $profileId);
    }
}
