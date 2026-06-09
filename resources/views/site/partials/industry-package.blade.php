<section class="pkg-section" id="pricing" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Package Pricing</span>
      <h2 class="s-head" id="pkg-heading">Everything included.<br><em>Fixed price.</em></h2>
    </div>
    <p>No tiers, no surprises. This is the complete package — services and add-ons pre-selected for your industry. The price you see here is your starting quote. Customise individual add-ons in the next step before committing to anything.</p>
  </div>

  @if(!empty($presetPackage))
  <div class="pkg-wrap">
    <div class="pkg-lines">
      @foreach($presetPackage['services'] as $svc)
      <div class="pkg-line">
        <span class="pkg-line-dot is-svc"></span>
        <span class="pkg-line-name">{{ $svc['name'] }}</span>
        <span class="pkg-line-price">
          ₦{{ number_format($svc['price']) }}{{ $svc['monthly'] ? '<small>/mo</small>' : '' }}
        </span>
      </div>
      @endforeach

      @foreach($presetPackage['addons'] as $addon)
      <div class="pkg-line">
        <span class="pkg-line-dot"></span>
        <span class="pkg-line-name">+ {{ $addon['name'] }}</span>
        <span class="pkg-line-price">
          ₦{{ number_format($addon['price']) }}{!! $addon['monthly'] ? '<small>/mo</small>' : '' !!}
        </span>
      </div>
      @endforeach
    </div>

    <div class="pkg-total-block">
      <div class="pkg-total-label">Package starts from</div>
      <div class="pkg-total-amount">₦{{ number_format($presetPackage['total']) }}</div>
      @if($presetPackage['has_monthly'])
      <div class="pkg-total-note">+ monthly add-ons billed separately</div>
      @endif
      <p class="pkg-disclaimer">Final price is built in the next step. Add-ons are pre-selected based on your industry but fully adjustable — remove what you don't need or add more.</p>
      <a href="{{ $startUrl }}" class="btn-gold pkg-cta">See My Full Quote →</a>
    </div>
  </div>
  @endif
</section>
