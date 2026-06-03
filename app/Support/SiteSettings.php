<?php

namespace App\Support;

use App\Models\SiteSetting;

class SiteSettings
{
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

    public function formDefaults(): array
    {
        $record = $this->record();

        return [
            'logo_dark'                => $record?->logo_dark,
            'logo_light'               => $record?->logo_light,
            'favicon'                  => $record?->favicon,
            'apple_touch_icon'         => $record?->apple_touch_icon,
            'analytics_enabled'        => $record?->analytics_enabled ?? false,
            'analytics_measurement_id' => $record?->analytics_measurement_id ?? '',
            'cookie_consent_enabled'   => $record?->cookie_consent_enabled ?? true,
            'cookie_banner_message'    => $record?->cookie_banner_message ?? '',
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
        ];
    }
}
