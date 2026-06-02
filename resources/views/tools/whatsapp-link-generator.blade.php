@extends('public.layouts.app')

@section('title', 'WhatsApp Link Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="waGenerator()">
            <form class="tool-form" @submit.prevent>
                <label>
                    Country code
                    <select x-model="countryCode" @change="generate()">
                        <option value="234">+234 — Nigeria</option>
                        <option value="233">+233 — Ghana</option>
                        <option value="254">+254 — Kenya</option>
                        <option value="27">+27 — South Africa</option>
                        <option value="44">+44 — United Kingdom</option>
                        <option value="1">+1 — United States / Canada</option>
                    </select>
                </label>
                <label>
                    Phone number
                    <input x-model="phone" @input="generate()" type="text" placeholder="8012345678">
                </label>
                <label>
                    Pre-filled message (optional)
                    <textarea x-model="message" @input="generate()" rows="3" placeholder="Hello, I’d like to ask about…"></textarea>
                </label>
            </form>

            <div class="tool-result" x-show="link">
                <h3>Your WhatsApp link</h3>
                <div class="tool-link-display">
                    <a :href="link" target="_blank" rel="noopener" x-text="link" class="tool-link-display__link"></a>
                </div>
                <div class="tool-actions">
                    <button @click="copyLink()" type="button" class="tools-button tools-button--dark">
                        <span x-text="copied ? ‘Copied!’ : ‘Copy link’"></span>
                    </button>
                    <a :href="link" target="_blank" rel="noopener" class="tools-button">Open in WhatsApp</a>
                </div>
                <div id="wa-qr" class="tool-qr"></div>
            </div>
        </div>
@endcomponent
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSE7lDoLDi2pEPQKZiS+n/1RG5TFblkfYFa==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/public/pages/tool-whatsapp-link-generator.js')
@endpush
