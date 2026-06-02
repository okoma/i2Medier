<div>
    @if($error)
        <div class="tool-error">{{ $error }}</div>
    @endif

    <form wire:submit="audit" class="tool-form">
        <label>
            Website URL
            <input wire:model="url" id="seo-url" type="url" placeholder="https://example.com" required>
        </label>
        @error('url') <span class="tool-field-error">{{ $message }}</span> @enderror
        <button type="submit" wire:loading.attr="disabled" class="tools-button tools-button--dark">
            <span wire:loading.remove wire:target="audit">Run Audit</span>
            <span wire:loading wire:target="audit">Analysing…</span>
        </button>
    </form>

    @if(count($results))
        <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
            <div class="tool-score">
                <span class="tool-score__number">{{ $score }}/100</span>
                <span class="tool-score__label">SEO Score</span>
            </div>
            <div class="tool-checks">
                @foreach($results as $check)
                    <div class="tool-check tool-check--{{ $check['status'] }}">
                        <span class="tool-check__status-icon">
                            @if($check['status'] === 'pass') ✓
                            @elseif($check['status'] === 'warn') ⚠
                            @else ✗
                            @endif
                        </span>
                        <span class="tool-check__name">{{ $check['name'] }}</span>
                        <span class="tool-check__message">{{ $check['message'] }}</span>
                    </div>
                @endforeach
            </div>

            @if(!$emailSubmitted)
                <div class="tool-gate">
                    <strong>Your SEO audit is ready</strong>
                    <p>Enter your email to unlock the full breakdown.</p>
                    <div class="tool-gate__form">
                        <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                        @if($emailError)
                            <span class="tool-field-error">{{ $emailError }}</span>
                        @endif
                        <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
