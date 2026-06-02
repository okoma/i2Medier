@php
    $siteSettings = app(\App\Support\SiteSettings::class);
    $cookieEnabled  = $siteSettings->cookieConsentEnabled();
    $cookieMessage  = $siteSettings->cookieBannerMessage();
    $analyticsOn    = $siteSettings->analyticsEnabled();
    $measurementId  = $siteSettings->measurementId();
@endphp

@if($cookieEnabled)
{{-- Cookie Consent Banner --}}
<div id="cookie-banner" class="cookie-banner" role="dialog" aria-live="polite" aria-label="Cookie consent" hidden data-analytics-on="{{ $analyticsOn ? 'true' : 'false' }}" data-measurement-id="{{ $measurementId }}" data-banner-enabled="{{ $cookieEnabled ? 'true' : 'false' }}">
  <div class="cookie-inner">
    <div class="cookie-text">
      <svg class="cookie-ico" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8Z"/><circle cx="12" cy="12" r="1" fill="currentColor"/><circle cx="9" cy="9" r="1" fill="currentColor"/><circle cx="15" cy="9" r="1" fill="currentColor"/><circle cx="9" cy="15" r="1" fill="currentColor"/><circle cx="15" cy="15" r="1" fill="currentColor"/></svg>
      <p>
        {{ $cookieMessage }}
        <a href="{{ route('site.privacy') }}" class="cookie-policy-link">Privacy Policy</a>
      </p>
    </div>
    <div class="cookie-actions">
      <button id="cookie-reject" class="cookie-btn cookie-btn-outline" type="button">Reject Non-Essential</button>
      <button id="cookie-accept" class="cookie-btn cookie-btn-primary" type="button">Accept All</button>
    </div>
  </div>
</div>
@endif
