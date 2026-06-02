<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'logo_dark',
        'logo_light',
        'analytics_enabled',
        'analytics_measurement_id',
        'cookie_consent_enabled',
        'cookie_banner_message',
        'pagespeed_api_key',
        'crux_api_key',
        'anthropic_api_key',
    ];

    protected $casts = [
        'analytics_enabled'     => 'boolean',
        'cookie_consent_enabled' => 'boolean',
    ];
}
