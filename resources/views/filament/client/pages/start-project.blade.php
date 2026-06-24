<x-filament-panels::page>
    @vite('resources/js/filament/client/start-project.js')

    <div
        class="onboarding-body"
        data-onboarding-fallback-url="{{ \App\Filament\Client\Pages\ServicesHub::getUrl(panel: 'client') }}"
        data-onboarding-submit-url="{{ route('portal.start-project.store') }}"
        data-onboarding-catalog='@json($this->onboardingCatalog)'
        data-onboarding-preset='@json($this->onboardingPreset)'
    >
        @include('filament.client.pages.partials.start-project-form')
    </div>
</x-filament-panels::page>
