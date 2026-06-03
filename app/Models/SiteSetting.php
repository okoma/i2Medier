<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'logo_dark',
        'logo_light',
        'favicon',
        'apple_touch_icon',
        'analytics_enabled',
        'analytics_measurement_id',
        'cookie_consent_enabled',
        'cookie_banner_message',
        'pagespeed_api_key',
        'crux_api_key',
        'anthropic_api_key',
        'openai_api_key',
        'gemini_api_key',
        'mistral_api_key',
        'ai_primary_provider',
        'anthropic_model',
        'openai_model',
        'gemini_model',
        'mistral_model',
    ];

    protected $casts = [
        'analytics_enabled'     => 'boolean',
        'cookie_consent_enabled' => 'boolean',
    ];
}
