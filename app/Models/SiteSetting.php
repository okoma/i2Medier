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
        'about_team_eyebrow',
        'about_team_heading',
        'about_team_intro',
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
        'deliverability_capture_driver',
        'deliverability_test_inbox_address',
        'deliverability_auto_delete',
        'deliverability_postmark_webhook_token',
        'deliverability_imap_host',
        'deliverability_imap_port',
        'deliverability_imap_encryption',
        'deliverability_imap_username',
        'deliverability_imap_password',
        'deliverability_imap_folder',
    ];

    protected $casts = [
        'analytics_enabled'     => 'boolean',
        'cookie_consent_enabled' => 'boolean',
        'deliverability_auto_delete' => 'boolean',
        'deliverability_postmark_webhook_token' => 'encrypted',
        'deliverability_imap_password' => 'encrypted',
    ];
}
