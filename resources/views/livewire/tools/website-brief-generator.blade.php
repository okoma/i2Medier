<div>
    <div class="tool-wizard-steps">
        <span class="tool-wizard-step {{ $step === 1 ? 'tool-wizard-step--active' : '' }}">1. Business</span>
        <span class="tool-wizard-divider">→</span>
        <span class="tool-wizard-step {{ $step === 2 ? 'tool-wizard-step--active' : '' }}">2. Goals</span>
        <span class="tool-wizard-divider">→</span>
        <span class="tool-wizard-step {{ $step === 3 ? 'tool-wizard-step--active' : '' }}">3. Budget</span>
    </div>

    @if($step === 1)
        <div class="tool-form">
            <label>
                Business name
                <input wire:model="businessName" type="text" placeholder="e.g. Apex Solutions">
            </label>
            @error('businessName') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Industry
                <select wire:model="industry">
                    <option value="">Select industry…</option>
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
                    <option value="other">Other</option>
                </select>
            </label>
            @error('industry') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Target audience
                <input wire:model="targetAudience" type="text" placeholder="e.g. SMBs in Lagos, working professionals 25–45">
            </label>
            @error('targetAudience') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Location / market
                <input wire:model="location" type="text" placeholder="e.g. Lagos, Nigeria">
            </label>
            @error('location') <span class="tool-field-error">{{ $message }}</span> @enderror

            <button wire:click="nextStep" type="button" class="tools-button tools-button--dark">Next →</button>
        </div>
    @endif

    @if($step === 2)
        <div class="tool-form">
            <label>
                Primary goal
                <select wire:model="primaryGoal">
                    <option value="generate leads">Generate leads</option>
                    <option value="sell products">Sell products</option>
                    <option value="share information">Share information</option>
                    <option value="build credibility">Build credibility</option>
                </select>
            </label>

            <fieldset class="tool-form__fieldset">
                <legend>Pages needed</legend>
                <label><input type="checkbox" wire:model="pages" value="Home"> Home</label>
                <label><input type="checkbox" wire:model="pages" value="About"> About</label>
                <label><input type="checkbox" wire:model="pages" value="Services"> Services</label>
                <label><input type="checkbox" wire:model="pages" value="Blog"> Blog</label>
                <label><input type="checkbox" wire:model="pages" value="Portfolio"> Portfolio</label>
                <label><input type="checkbox" wire:model="pages" value="Contact"> Contact</label>
                <label><input type="checkbox" wire:model="pages" value="Shop"> Shop</label>
            </fieldset>

            <label>
                Design style
                <select wire:model="designStyle">
                    <option value="clean & minimal">Clean & Minimal</option>
                    <option value="bold & modern">Bold & Modern</option>
                    <option value="classic & elegant">Classic & Elegant</option>
                    <option value="playful & vibrant">Playful & Vibrant</option>
                </select>
            </label>

            <div class="tool-wizard-nav">
                <button wire:click="prevStep" type="button" class="tools-button">← Back</button>
                <button wire:click="nextStep" type="button" class="tools-button tools-button--dark">Next →</button>
            </div>
        </div>
    @endif

    @if($step === 3)
        <div class="tool-form">
            <label>
                Estimated budget
                <select wire:model="budget">
                    <option value="Under ₦200k">Under ₦200k</option>
                    <option value="₦200k–₦500k">₦200k–₦500k</option>
                    <option value="₦500k–₦1.5m">₦500k–₦1.5m</option>
                    <option value="₦1.5m+">₦1.5m+</option>
                </select>
            </label>

            <label>
                Timeline
                <select wire:model="timeline">
                    <option value="ASAP">ASAP</option>
                    <option value="2–4 weeks">2–4 weeks</option>
                    <option value="1–3 months">1–3 months</option>
                    <option value="Flexible">Flexible</option>
                </select>
            </label>

            <label>
                Additional notes (optional)
                <textarea wire:model="additionalNotes" rows="3" placeholder="Anything else we should know…"></textarea>
            </label>

            <div class="tool-wizard-nav">
                <button wire:click="prevStep" type="button" class="tools-button">← Back</button>
            </div>
        </div>

        @if($businessName)
            <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
                <div class="tool-brief">
                    <h3>Website Brief — {{ $businessName }}</h3>
                    <dl class="tool-brief__list">
                        <dt>Industry</dt><dd>{{ $industry }}</dd>
                        <dt>Target audience</dt><dd>{{ $targetAudience }}</dd>
                        <dt>Location</dt><dd>{{ $location }}</dd>
                        <dt>Primary goal</dt><dd>{{ $primaryGoal }}</dd>
                        <dt>Pages</dt><dd>{{ count($pages) ? implode(', ', $pages) : 'Not specified' }}</dd>
                        <dt>Design style</dt><dd>{{ $designStyle }}</dd>
                        <dt>Budget</dt><dd>{{ $budget }}</dd>
                        <dt>Timeline</dt><dd>{{ $timeline }}</dd>
                        @if($additionalNotes)
                            <dt>Notes</dt><dd>{{ $additionalNotes }}</dd>
                        @endif
                    </dl>
                </div>

                @if(!$emailSubmitted)
                    <div class="tool-gate">
                        <strong>Your brief is ready</strong>
                        <p>Enter your email to unlock and print your brief.</p>
                        <div class="tool-gate__form">
                            <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                            @if($emailError)
                                <span class="tool-field-error">{{ $emailError }}</span>
                            @endif
                            <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Brief →</button>
                        </div>
                    </div>
                @else
                    <button onclick="window.print()" type="button" class="tools-button tools-button--dark">Print / Save PDF</button>
                @endif
            </div>
        @endif
    @endif
</div>
