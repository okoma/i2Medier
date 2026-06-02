<div class="tools-page">
    <section class="tool-shell">
        <div class="tool-shell__inner">
            <div class="tool-shell__copy">
                <nav class="tools-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('site.home') }}">Home</a>
                    <span>›</span>
                    <a href="{{ route('tools.hub') }}">Tools</a>
                    <span>›</span>
                    <span aria-current="page">{{ $tool['title'] }}</span>
                </nav>

                <span class="tools-chip">{{ $tool['label'] }}</span>
                <h1>{{ $tool['title'] }}</h1>
                <p>{{ $tool['description'] }}</p>

                <ul class="tool-feature-list">
                    @foreach ($tool['features'] as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="tool-shell__card">
                {{ $slot }}

                <div class="tool-related">
                    <h3>Related tools</h3>
                    <div class="tool-related__list">
                        @foreach ($relatedTools as $relatedTool)
                            <a href="{{ route($relatedTool['route']) }}">{{ $relatedTool['title'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tool-explainer">
        <div class="tool-explainer__inner">
            <span class="section-label">How it works</span>
            <h2>Simple steps, practical output.</h2>
            <div class="tool-steps">
                @foreach ($tool['steps'] as $index => $step)
                    <article class="tool-step">
                        <span class="tool-step__number">{{ $index + 1 }}</span>
                        <p>{{ $step }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</div>
