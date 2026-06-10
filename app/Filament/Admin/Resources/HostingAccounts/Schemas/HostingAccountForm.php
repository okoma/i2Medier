<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Schemas;

use App\Enums\HostingStatus;
use App\Enums\HostingType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HostingAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hosting Account')
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->label('Client')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('name')
                            ->label('Plan Name')
                            ->placeholder('Business Hosting Plan')
                            ->required()
                            ->maxLength(255),
                        Select::make('type')
                            ->options(HostingType::class)
                            ->default(HostingType::Cpanel->value)
                            ->required(),
                        TextInput::make('primary_domain')
                            ->label('Primary Domain')
                            ->placeholder('example.com')
                            ->maxLength(255),
                        Select::make('status')
                            ->options(HostingStatus::class)
                            ->default(HostingStatus::Active->value)
                            ->required(),
                        TextInput::make('server_location')
                            ->label('Server Location')
                            ->placeholder('New York, USA')
                            ->maxLength(255),
                        TextInput::make('control_panel_url')
                            ->label('Control Panel URL')
                            ->url()
                            ->maxLength(500),
                    ]),
                Section::make('Billing')
                    ->columns(2)
                    ->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('₦'),
                        TextInput::make('currency')
                            ->default('NGN')
                            ->maxLength(10),
                        Select::make('billing_cycle')
                            ->options([
                                'monthly'   => 'Monthly',
                                'quarterly' => 'Quarterly',
                                'biannual'  => 'Bi-annual',
                                'annual'    => 'Annual',
                            ]),
                        Toggle::make('auto_renew')
                            ->label('Auto-Renew')
                            ->default(true),
                        DatePicker::make('starts_at')
                            ->label('Start Date'),
                        DatePicker::make('expires_at')
                            ->label('Renewal Date'),
                    ]),
                Section::make('Resource Usage')
                    ->columns(2)
                    ->schema([
                        TextInput::make('cpu_usage_percent')
                            ->label('CPU Usage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0),
                        TextInput::make('ram_usage_percent')
                            ->label('RAM Usage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0),
                        TextInput::make('disk_usage_percent')
                            ->label('Disk Usage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0),
                        TextInput::make('bandwidth_usage_percent')
                            ->label('Bandwidth Usage (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(0),
                        DateTimePicker::make('last_backup_at')
                            ->label('Last Backup'),
                        Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
