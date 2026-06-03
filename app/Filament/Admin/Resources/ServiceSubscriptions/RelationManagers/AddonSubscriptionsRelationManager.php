<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\RelationManagers;

use App\Models\OnboardingAddon;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AddonSubscriptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'addonSubscriptions';

    protected static ?string $title = 'Add-on Subscriptions';

    public function form(Schema $schema): Schema
    {
        /** @var \App\Models\ServiceSubscription $subscription */
        $subscription = $this->getOwnerRecord();

        return $schema->components([
            Select::make('onboarding_addon_id')
                ->label('Add-on')
                ->options($this->availableAddonOptions($subscription))
                ->searchable()
                ->preload()
                ->required(),
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'active' => 'Active',
                    'expired' => 'Expired',
                    'suspended' => 'Suspended',
                    'cancelled' => 'Cancelled',
                ])
                ->default('pending')
                ->required(),
            TextInput::make('price')
                ->numeric()
                ->required(),
            TextInput::make('quantity')
                ->numeric()
                ->default(1)
                ->minValue(1)
                ->required(),
            Select::make('billing_type')
                ->options([
                    'one_time' => 'One-time',
                    'recurring' => 'Recurring',
                ])
                ->required(),
            Select::make('billing_cycle')
                ->options([
                    'monthly' => 'Monthly',
                    'quarterly' => 'Quarterly',
                    'biannual' => 'Biannual',
                    'yearly' => 'Yearly',
                ]),
            Select::make('currency')
                ->options([
                    'NGN' => 'NGN',
                    'USD' => 'USD',
                    'GBP' => 'GBP',
                ])
                ->default('NGN')
                ->required(),
            DatePicker::make('starts_at'),
            DatePicker::make('expires_at'),
            Toggle::make('auto_renew')
                ->default(false),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('catalog_name')
                    ->label('Add-on'),
                TextColumn::make('quantity')
                    ->badge()
                    ->placeholder('1'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('billing_type')
                    ->badge(),
                TextColumn::make('billing_cycle')
                    ->badge()
                    ->placeholder('One-time'),
                TextColumn::make('price')
                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                TextColumn::make('expires_at')
                    ->date()
                    ->placeholder('No expiry'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data) use ($subscription): array {
                        $addon = OnboardingAddon::query()->findOrFail($data['onboarding_addon_id']);

                        $data['client_id'] = $subscription->client_id;
                        $data['quantity'] = max(1, (int) ($data['quantity'] ?? 1));
                        $data['price'] = $data['price'] ?? ($addon->price * $data['quantity']);
                        $data['currency'] = $data['currency'] ?? $addon->currency;
                        $data['billing_type'] = $data['billing_type'] ?? $addon->billing_type;
                        $data['billing_cycle'] = $data['billing_cycle'] ?? $addon->billing_cycle;

                        return $data;
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->mutateDataUsing(function (array $data): array {
                        $addon = OnboardingAddon::query()->find($data['onboarding_addon_id'] ?? null);

                        if ($addon) {
                            $data['quantity'] = max(1, (int) ($data['quantity'] ?? 1));
                            $data['price'] = $data['price'] ?? ($addon->price * $data['quantity']);
                            $data['currency'] = $data['currency'] ?? $addon->currency;
                            $data['billing_type'] = $data['billing_type'] ?? $addon->billing_type;
                            $data['billing_cycle'] = $data['billing_cycle'] ?? $addon->billing_cycle;
                        }

                        return $data;
                    }),
                DeleteAction::make(),
            ]);
    }

    /**
     * @return array<int, string>
     */
    protected function availableAddonOptions($subscription): array
    {
        $query = OnboardingAddon::query()
            ->where('is_active', true)
            ->where('onboarding_service_id', $subscription->onboarding_service_id)
            ->orderBy('sort_order');

        if ($subscription->onboarding_service_variant_id) {
            $query->where(function ($addonQuery) use ($subscription): void {
                $addonQuery
                    ->whereNull('onboarding_service_variant_id')
                    ->orWhere('onboarding_service_variant_id', $subscription->onboarding_service_variant_id);
            });
        } else {
            $query->whereNull('onboarding_service_variant_id');
        }

        return $query->get()->mapWithKeys(fn (OnboardingAddon $addon) => [
            $addon->id => $addon->name,
        ])->all();
    }
}
