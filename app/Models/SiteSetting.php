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
        'business_hours_timezone',
        'business_hours',
        'holiday_override_enabled',
        'holiday_override_status',
        'holiday_override_notice',
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
        // Transactional mailer
        'mail_transactional_transport',
        'mail_transactional_from_address',
        'mail_transactional_from_name',
        'mail_transactional_scheme',
        'mail_transactional_host',
        'mail_transactional_port',
        'mail_transactional_username',
        'mail_transactional_password',
        // Newsletter mailer
        'mail_newsletter_transport',
        'mail_newsletter_from_address',
        'mail_newsletter_from_name',
        'mail_newsletter_scheme',
        'mail_newsletter_host',
        'mail_newsletter_port',
        'mail_newsletter_username',
        'mail_newsletter_password',
        // AWS SES
        'aws_ses_key',
        'aws_ses_secret',
        'aws_ses_region',
        // Email routing
        'mail_route_contact_form',
        'mail_route_onboarding',
        'mail_route_invoice',
        'mail_route_password_reset',
        'mail_route_admin_notification',
        'mail_route_campaign',
    ];

    protected $casts = [
        'analytics_enabled'     => 'boolean',
        'cookie_consent_enabled' => 'boolean',
        'business_hours' => 'array',
        'holiday_override_enabled' => 'boolean',
        'deliverability_auto_delete' => 'boolean',
        'deliverability_postmark_webhook_token' => 'encrypted',
        'deliverability_imap_password'          => 'encrypted',
        'mail_transactional_password'           => 'encrypted',
        'mail_newsletter_password'              => 'encrypted',
        'aws_ses_key'                           => 'encrypted',
        'aws_ses_secret'                        => 'encrypted',
    ];
}
