<?php

namespace App\Filament\Admin\Resources\Websites\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class WebsiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Website Details')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('package_id')
                            ->relationship('package', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('primary_domain')
                            ->maxLength(255),
                        TextInput::make('staging_url')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('niche')
                            ->maxLength(255),
                        Select::make('cms')
                            ->options([
                                'wordpress' => 'WordPress',
                                'laravel' => 'Laravel',
                                'custom' => 'Custom',
                                'other' => 'Other',
                            ])
                            ->default('wordpress'),
                        Select::make('health_state')
                            ->options([
                                'pending_setup' => 'Pending Setup',
                                'active' => 'Active',
                                'at_risk' => 'At Risk',
                                'suspended' => 'Suspended',
                                'archived' => 'Archived',
                            ])
                            ->default('pending_setup')
                            ->required(),
                        Toggle::make('is_active')
                            ->default(true),
                    ]),
                Section::make('Domain, Hosting & SSL')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('hosting_provider')
                            ->maxLength(255),
                        Select::make('hosting_status')
                            ->options([
                                'active' => 'Active',
                                'expiring' => 'Expiring',
                                'expired' => 'Expired',
                            ]),
                        DatePicker::make('hosting_expiry_date'),
                        TextInput::make('domain_registrar')
                            ->maxLength(255),
                        Select::make('domain_status')
                            ->options([
                                'active' => 'Active',
                                'expiring' => 'Expiring',
                                'expired' => 'Expired',
                            ]),
                        DatePicker::make('domain_expiry_date'),
                        TextInput::make('ssl_provider')
                            ->maxLength(255),
                        Select::make('ssl_status')
                            ->options([
                                'active' => 'Active',
                                'expiring' => 'Expiring',
                                'expired' => 'Expired',
                            ]),
                        DatePicker::make('ssl_expiry_date'),
                    ]),
                Section::make('Credentials & Notes')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('cms_admin_url')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('cms_admin_user')
                            ->maxLength(255),
                        TextInput::make('cms_admin_password')
                            ->password()
                            ->revealable(),
                        Textarea::make('notes')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
