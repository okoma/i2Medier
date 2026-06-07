<?php

namespace App\Support;

use App\Models\SiteSetting;

class SiteSettings
{
    public const DEFAULT_BUSINESS_HOURS = [
        'monday' => ['enabled' => true, 'open' => '09:00 AM', 'close' => '06:00 PM'],
        'tuesday' => ['enabled' => true, 'open' => '09:00 AM', 'close' => '06:00 PM'],
        'wednesday' => ['enabled' => true, 'open' => '09:00 AM', 'close' => '06:00 PM'],
        'thursday' => ['enabled' => true, 'open' => '09:00 AM', 'close' => '06:00 PM'],
        'friday' => ['enabled' => true, 'open' => '09:00 AM', 'close' => '06:00 PM'],
        'saturday' => ['enabled' => true, 'open' => '10:00 AM', 'close' => '02:00 PM'],
        'sunday' => ['enabled' => false, 'open' => '', 'close' => ''],
    ];

    public function record(): ?SiteSetting
    {
        return SiteSetting::query()->first();
    }

    public function logoDark(): ?string
    {
        $path = $this->record()?->logo_dark;

        return $path ? asset('storage/' . $path) : null;
    }

    public function logoLight(): ?string
    {
        $path = $this->record()?->logo_light;

        return $path ? asset('storage/' . $path) : null;
    }

    public function favicon(): ?string
    {
        $path = $this->record()?->favicon;

        return $path ? asset('storage/' . $path) : null;
    }

    public function appleTouchIcon(): ?string
    {
        $path = $this->record()?->apple_touch_icon;

        return $path ? asset('storage/' . $path) : null;
    }

    public function aboutTeamEyebrow(): string
    {
        return (string) ($this->record()?->about_team_eyebrow ?: 'The People');
    }

    public function aboutTeamHeading(): string
    {
        return (string) ($this->record()?->about_team_heading ?: 'Small team.<br>Serious craft.');
    }

    public function aboutTeamIntro(): string
    {
        return (string) ($this->record()?->about_team_intro ?: 'We are deliberately small. A focused team means every client gets senior attention — not a junior handed their project and told to run with it. Every person on the i2Medier team works directly on client projects.');
    }

    public function analyticsEnabled(): bool
    {
        return (bool) ($this->record()?->analytics_enabled ?? false);
    }

    public function measurementId(): string
    {
        return (string) ($this->record()?->analytics_measurement_id ?? '');
    }

    public function cookieConsentEnabled(): bool
    {
        $record = $this->record();

        // Default to enabled if no record exists yet
        if ($record === null) {
            return true;
        }

        return (bool) $record->cookie_consent_enabled;
    }

    public function cookieBannerMessage(): string
    {
        return (string) ($this->record()?->cookie_banner_message
            ?: 'We use cookies to understand how visitors use our site and to improve your experience. Analytics cookies are only activated with your consent.');
    }

    public function businessHoursTimezone(): string
    {
        return (string) ($this->record()?->business_hours_timezone ?? 'Africa/Lagos');
    }

    public function businessHours(): array
    {
        $hours = $this->record()?->business_hours;

        if (! is_array($hours) || $hours === []) {
            return self::DEFAULT_BUSINESS_HOURS;
        }

        return array_replace_recursive(self::DEFAULT_BUSINESS_HOURS, $hours);
    }

    public function holidayOverrideEnabled(): bool
    {
        return (bool) ($this->record()?->holiday_override_enabled ?? false);
    }

    public function holidayOverrideStatus(): string
    {
        return (string) ($this->record()?->holiday_override_status ?? 'closed');
    }

    public function holidayOverrideNotice(): string
    {
        return (string) ($this->record()?->holiday_override_notice ?? '');
    }

    public function footerHoursLines(): array
    {
        $businessHours = $this->businessHours();
        $orderedDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $dayShortLabels = [
            'monday' => 'Mon',
            'tuesday' => 'Tue',
            'wednesday' => 'Wed',
            'thursday' => 'Thu',
            'friday' => 'Fri',
            'saturday' => 'Saturday',
            'sunday' => 'Sunday',
        ];
        $footerHoursLines = [];

        for ($index = 0; $index < count($orderedDays); $index++) {
            $dayKey = $orderedDays[$index];
            $dayConfig = $businessHours[$dayKey] ?? ['enabled' => false, 'open' => '', 'close' => ''];

            if (! ($dayConfig['enabled'] ?? false)) {
                continue;
            }

            $startIndex = $index;
            $endIndex = $index;

            while ($endIndex + 1 < count($orderedDays)) {
                $nextDayKey = $orderedDays[$endIndex + 1];
                $nextConfig = $businessHours[$nextDayKey] ?? ['enabled' => false, 'open' => '', 'close' => ''];

                if (
                    ! ($nextConfig['enabled'] ?? false)
                    || ($nextConfig['open'] ?? '') !== ($dayConfig['open'] ?? '')
                    || ($nextConfig['close'] ?? '') !== ($dayConfig['close'] ?? '')
                ) {
                    break;
                }

                $endIndex++;
            }

            $label = $startIndex === $endIndex
                ? $dayShortLabels[$dayKey]
                : $dayShortLabels[$orderedDays[$startIndex]] . '–' . $dayShortLabels[$orderedDays[$endIndex]];

            $footerHoursLines[] = sprintf('%s: %s – %s', $label, $dayConfig['open'], $dayConfig['close']);
            $index = $endIndex;
        }

        return $footerHoursLines;
    }

    public function footerViewData(): array
    {
        $businessTimezone = $this->businessHoursTimezone();

        return [
            'businessHours' => $this->businessHours(),
            'businessTimezone' => $businessTimezone,
            'holidayOverrideEnabled' => $this->holidayOverrideEnabled(),
            'holidayOverrideStatus' => $this->holidayOverrideStatus(),
            'holidayOverrideNotice' => $this->holidayOverrideNotice(),
            'timezoneLabel' => $businessTimezone === 'Africa/Lagos' ? 'WAT' : $businessTimezone,
            'footerHoursLines' => $this->footerHoursLines(),
        ];
    }

    public function pagespeedApiKey(): string
    {
        return (string) ($this->record()?->pagespeed_api_key ?? '');
    }

    public function cruxApiKey(): string
    {
        return (string) ($this->record()?->crux_api_key ?? '');
    }

    public function anthropicApiKey(): string
    {
        return (string) ($this->record()?->anthropic_api_key ?? '');
    }

    public function openAiApiKey(): string
    {
        return (string) ($this->record()?->openai_api_key ?? '');
    }

    public function geminiApiKey(): string
    {
        return (string) ($this->record()?->gemini_api_key ?? '');
    }

    public function mistralApiKey(): string
    {
        return (string) ($this->record()?->mistral_api_key ?? '');
    }

    public function aiPrimaryProvider(): string
    {
        return (string) ($this->record()?->ai_primary_provider ?? 'auto');
    }

    public function anthropicModel(): string
    {
        return (string) ($this->record()?->anthropic_model ?? '');
    }

    public function openAiModel(): string
    {
        return (string) ($this->record()?->openai_model ?? '');
    }

    public function geminiModel(): string
    {
        return (string) ($this->record()?->gemini_model ?? '');
    }

    public function mistralModel(): string
    {
        return (string) ($this->record()?->mistral_model ?? '');
    }

    public function deliverabilityCaptureDriver(): string
    {
        return (string) ($this->record()?->deliverability_capture_driver ?? 'imap');
    }

    public function deliverabilityTestInboxAddress(): string
    {
        return (string) ($this->record()?->deliverability_test_inbox_address ?? '');
    }

    public function deliverabilityAutoDelete(): bool
    {
        return (bool) ($this->record()?->deliverability_auto_delete ?? true);
    }

    public function deliverabilityPostmarkWebhookToken(): string
    {
        return (string) ($this->record()?->deliverability_postmark_webhook_token ?? '');
    }

    public function deliverabilityImapHost(): string
    {
        return (string) ($this->record()?->deliverability_imap_host ?? '');
    }

    public function deliverabilityImapPort(): int
    {
        return (int) ($this->record()?->deliverability_imap_port ?? 993);
    }

    public function deliverabilityImapEncryption(): string
    {
        return (string) ($this->record()?->deliverability_imap_encryption ?? 'ssl');
    }

    public function deliverabilityImapUsername(): string
    {
        return (string) ($this->record()?->deliverability_imap_username ?? '');
    }

    public function deliverabilityImapPassword(): string
    {
        return (string) ($this->record()?->deliverability_imap_password ?? '');
    }

    public function deliverabilityImapFolder(): string
    {
        return (string) ($this->record()?->deliverability_imap_folder ?? 'INBOX');
    }

    public function businessNameAiConfig(): array
    {
        return [
            'preferred' => $this->aiPrimaryProvider(),
            'anthropic' => $this->anthropicApiKey(),
            'openai' => $this->openAiApiKey(),
            'gemini' => $this->geminiApiKey(),
            'mistral' => $this->mistralApiKey(),
            'anthropic_model' => $this->anthropicModel(),
            'openai_model' => $this->openAiModel(),
            'gemini_model' => $this->geminiModel(),
            'mistral_model' => $this->mistralModel(),
        ];
    }

    public function deliverabilityTestConfig(): array
    {
        return [
            'driver' => $this->deliverabilityCaptureDriver(),
            'test_inbox_address' => $this->deliverabilityTestInboxAddress(),
            'auto_delete' => $this->deliverabilityAutoDelete(),
            'postmark_webhook_token' => $this->deliverabilityPostmarkWebhookToken(),
            'imap_host' => $this->deliverabilityImapHost(),
            'imap_port' => $this->deliverabilityImapPort(),
            'imap_encryption' => $this->deliverabilityImapEncryption(),
            'imap_username' => $this->deliverabilityImapUsername(),
            'imap_password' => $this->deliverabilityImapPassword(),
            'imap_folder' => $this->deliverabilityImapFolder(),
        ];
    }

    public function formDefaults(): array
    {
        $record = $this->record();

        return [
            'logo_dark'                => $record?->logo_dark,
            'logo_light'               => $record?->logo_light,
            'favicon'                  => $record?->favicon,
            'apple_touch_icon'         => $record?->apple_touch_icon,
            'about_team_eyebrow'       => $record?->about_team_eyebrow ?? 'The People',
            'about_team_heading'       => $record?->about_team_heading ?? 'Small team.<br>Serious craft.',
            'about_team_intro'         => $record?->about_team_intro ?? 'We are deliberately small. A focused team means every client gets senior attention — not a junior handed their project and told to run with it. Every person on the i2Medier team works directly on client projects.',
            'analytics_enabled'        => $record?->analytics_enabled ?? false,
            'analytics_measurement_id' => $record?->analytics_measurement_id ?? '',
            'cookie_consent_enabled'   => $record?->cookie_consent_enabled ?? true,
            'cookie_banner_message'    => $record?->cookie_banner_message ?? '',
            'business_hours_timezone'  => $record?->business_hours_timezone ?? 'Africa/Lagos',
            'business_hours'           => is_array($record?->business_hours) ? array_replace_recursive(self::DEFAULT_BUSINESS_HOURS, $record->business_hours) : self::DEFAULT_BUSINESS_HOURS,
            'holiday_override_enabled' => $record?->holiday_override_enabled ?? false,
            'holiday_override_status'  => $record?->holiday_override_status ?? 'closed',
            'holiday_override_notice'  => $record?->holiday_override_notice ?? '',
            'pagespeed_api_key'        => $record?->pagespeed_api_key ?? '',
            'crux_api_key'             => $record?->crux_api_key ?? '',
            'anthropic_api_key'        => $record?->anthropic_api_key ?? '',
            'openai_api_key'           => $record?->openai_api_key ?? '',
            'gemini_api_key'           => $record?->gemini_api_key ?? '',
            'mistral_api_key'          => $record?->mistral_api_key ?? '',
            'ai_primary_provider'      => $record?->ai_primary_provider ?? 'auto',
            'anthropic_model'          => $record?->anthropic_model ?? '',
            'openai_model'             => $record?->openai_model ?? '',
            'gemini_model'             => $record?->gemini_model ?? '',
            'mistral_model'            => $record?->mistral_model ?? '',
            'deliverability_capture_driver' => $record?->deliverability_capture_driver ?? 'imap',
            'deliverability_test_inbox_address' => $record?->deliverability_test_inbox_address ?? '',
            'deliverability_auto_delete' => $record?->deliverability_auto_delete ?? true,
            'deliverability_postmark_webhook_token' => $record?->deliverability_postmark_webhook_token ?? '',
            'deliverability_imap_host' => $record?->deliverability_imap_host ?? '',
            'deliverability_imap_port' => $record?->deliverability_imap_port ?? 993,
            'deliverability_imap_encryption' => $record?->deliverability_imap_encryption ?? 'ssl',
            'deliverability_imap_username' => $record?->deliverability_imap_username ?? '',
            'deliverability_imap_password' => $record?->deliverability_imap_password ?? '',
            'deliverability_imap_folder' => $record?->deliverability_imap_folder ?? 'INBOX',
        ];
    }
}
