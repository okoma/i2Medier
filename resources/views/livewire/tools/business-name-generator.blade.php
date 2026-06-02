<div>
    <form wire:submit="generate" class="tool-form">
        <label>
            Keyword
            <input wire:model="keyword" type="text" placeholder="e.g. Apex, Nova, Lagos" required>
        </label>
        @error('keyword') <span class="tool-field-error">{{ $message }}</span> @enderror
        <label>
            Industry
            <select wire:model="industry">
                <option value="general">General</option>
                <option value="tech">Technology</option>
                <option value="finance">Finance</option>
                <option value="health">Health</option>
                <option value="food">Food & Beverage</option>
                <option value="fashion">Fashion</option>
                <option value="real-estate">Real Estate</option>
                <option value="logistics">Logistics</option>
                <option value="education">Education</option>
                <option value="media">Media</option>
                <option value="retail">Retail</option>
                <option value="consulting">Consulting</option>
                <option value="agriculture">Agriculture</option>
                <option value="beauty">Beauty</option>
                <option value="sports">Sports & Fitness</option>
            </select>
        </label>
        <button type="submit" class="tools-button tools-button--dark">Generate Names</button>
    </form>

    @if(count($names))
        <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
            <div class="tool-name-chips">
                @foreach($names as $name)
                    <button
                        type="button"
                        class="tool-chip"
                        data-name="{{ $name }}"
                        onclick="navigator.clipboard.writeText(this.dataset.name)"
                        title="Click to copy"
                    >{{ $name }}</button>
                @endforeach
            </div>

            @if(!$emailSubmitted)
                <div class="tool-gate">
                    <strong>Your name ideas are ready</strong>
                    <p>Enter your email to unlock and copy the full list.</p>
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
