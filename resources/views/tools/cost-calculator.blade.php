@extends('public.layouts.app')

@section('title', 'Website Cost Calculator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="costCalculator()" x-init="updateEstimate()">
            <form class="tool-form" @submit.prevent>
                <label>
                    Project type
                    <select x-model="projectType" @change="updateEstimate()">
                        <option value="brochure">Basic brochure site (1–5 pages)</option>
                        <option value="business">Business site (6–15 pages)</option>
                        <option value="ecommerce">E-commerce</option>
                        <option value="webapp">Custom web app</option>
                    </select>
                </label>

                <fieldset class="tool-form__fieldset">
                    <legend>Add features</legend>
                    <label><input type="checkbox" x-model="features.blog" @change="updateEstimate()"> Blog / CMS</label>
                    <label><input type="checkbox" x-model="features.booking" @change="updateEstimate()"> Booking system</label>
                    <label><input type="checkbox" x-model="features.payment" @change="updateEstimate()"> Payment integration</label>
                    <label><input type="checkbox" x-model="features.animations" @change="updateEstimate()"> Animations / motion</label>
                    <label><input type="checkbox" x-model="features.urgent" @change="updateEstimate()"> Urgent timeline (&lt;2 weeks) +20%</label>
                </fieldset>
            </form>

            <div class="tool-result" :class="{'tool-result--blurred': !emailSubmitted}">
                <div class="tool-estimate">
                    <h3>Estimated range: <span x-text="formatRange()"></span></h3>
                    <p class="tool-estimate__maintenance">Monthly maintenance care: ₦30,000 – ₦80,000/mo</p>
                </div>

                <template x-if="!emailSubmitted">
                    <div class="tool-gate">
                        <strong>Your estimate is ready</strong>
                        <p>Enter your email to keep this result.</p>
                        <div class="tool-gate__form">
                            <input x-model="gateEmail" type="email" placeholder="you@example.com" class="tool-gate__input">
                            <span x-show="gateError" x-text="gateError" class="tool-field-error"></span>
                            <button @click="submitEmail()" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
@endcomponent
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-cost-calculator.js')
@endpush
