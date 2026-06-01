@extends('public.layouts.app')

@section('title', $project->title . ' — Case Study · i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/portfolio-single.css')
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach((el) => obs.observe(el));
});
</script>
@endpush

@section('content')

@if ($isPreview ?? false)
<div class="preview-banner">
  <span>⚠ Draft Preview — this project is not yet published. Only you can see this page.</span>
  <a href="{{ url()->previous() }}">← Back to editor</a>
</div>
@endif

{{-- Breadcrumb --}}
<div class="breadcrumb" aria-label="Breadcrumb">
  <a href="{{ route('site.home') }}">Home</a>
  <span class="breadcrumb-sep">›</span>
  <a href="{{ route('portfolio.index') }}">Portfolio</a>
  <span class="breadcrumb-sep">›</span>
  <span aria-current="page">{{ $project->title }}</span>
</div>

{{-- Project Hero --}}
<div class="proj-hero">
  <div class="proj-hero-glow"></div>
  <div class="proj-hero-grid"></div>
  <div class="proj-hero-inner">

    <div class="proj-hero-left">
      <span class="proj-tag"><span class="proj-dot"></span> Case Study</span>
      <h1>{{ $project->title }}</h1>
      <p class="proj-hero-subtitle">{{ $project->summary }}</p>
      <div class="proj-meta-row">
        @if ($project->client_name)
          <div class="proj-meta-item">
            <span class="proj-meta-label">Client</span>
            <span class="proj-meta-value">{{ $project->client_name }}</span>
          </div>
        @endif
        @if ($project->published_at)
          <div class="proj-meta-item">
            <span class="proj-meta-label">Delivered</span>
            <span class="proj-meta-value">{{ $project->published_at->year }}</span>
          </div>
        @endif
        @if ($project->categories->isNotEmpty())
          <div class="proj-meta-item">
            <span class="proj-meta-label">Category</span>
            <span class="proj-meta-value">{{ $project->categories->first()->name }}</span>
          </div>
        @endif
        @if (!empty($project->tech_stack[0]))
          <div class="proj-meta-item">
            <span class="proj-meta-label">Platform</span>
            <span class="proj-meta-value gold">{{ $project->tech_stack[0] }}</span>
          </div>
        @endif
      </div>
    </div>

    <div class="proj-hero-right">
      <div class="proj-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            @if ($project->project_url)
              <span>{{ parse_url($project->project_url, PHP_URL_HOST) }}</span>
            @else
              <span>i2medier.com/portfolio</span>
            @endif
          </div>
        </div>
        <div class="mock-body">
          @if ($project->featured_image)
            <img src="{{ $project->featured_image }}" alt="{{ e($project->title) }}" class="mock-featured-img">
          @else
            <div class="mock-initials-area">
              <div class="mock-wordmark">
                {{ collect(explode(' ', $project->title))->map(fn($w) => strtoupper(mb_substr($w,0,1)))->take(3)->join('') }}
              </div>
              @if ($project->client_name)
                <div class="mock-tagline">{{ $project->client_name }}</div>
              @endif
              @if (!empty($project->tech_stack))
                <div class="mock-tech-chips">
                  @foreach (array_slice($project->tech_stack, 0, 4) as $tech)
                    <span class="mock-tech-chip">{{ $tech }}</span>
                  @endforeach
                </div>
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>

  </div>
</div>

{{-- Case Body --}}
<div class="case-body">

  <div class="case-main">
    <div class="cs-prose reveal">
      @if (!empty($project->content['blocks']))
        <x-editorjs-renderer :content="$project->content" />
      @elseif ($project->description)
        {!! nl2br(e($project->description)) !!}
      @else
        <p style="color:var(--g400);font-style:italic">No case study content yet.</p>
      @endif
    </div>
  </div>

  <aside class="case-sidebar">

    {{-- Project Info --}}
    <div class="sidebar-card reveal">
      <div class="sidebar-card-head">Project Info</div>
      <div class="sidebar-card-body">
        <div class="info-list">
          @if ($project->client_name)
            <div class="info-row">
              <span class="info-key">Client</span>
              <span class="info-val">{{ $project->client_name }}</span>
            </div>
          @endif
          <div class="info-row">
            <span class="info-key">Project Type</span>
            <span class="info-val">{{ $project->type === 'inhouse' ? 'In-House Product' : 'Client Work' }}</span>
          </div>
          @if ($project->categories->isNotEmpty())
            <div class="info-row">
              <span class="info-key">Category</span>
              <span class="info-val">{{ $project->categories->pluck('name')->join(', ') }}</span>
            </div>
          @endif
          @if ($project->published_at)
            <div class="info-row">
              <span class="info-key">Delivered</span>
              <span class="info-val">{{ $project->published_at->format('Y') }}</span>
            </div>
          @endif
          <div class="info-row">
            <span class="info-key">Status</span>
            <span class="info-val live">● {{ ucfirst($project->status) }}</span>
          </div>
          @if ($project->project_url)
            <div class="info-row">
              <span class="info-key">Live Site</span>
              <span class="info-val">
                <a href="{{ $project->project_url }}" target="_blank" rel="noreferrer">
                  {{ parse_url($project->project_url, PHP_URL_HOST) }}
                </a>
              </span>
            </div>
          @endif
        </div>
      </div>
    </div>

    {{-- Tech Stack --}}
    @if (!empty($project->tech_stack))
      <div class="sidebar-card reveal">
        <div class="sidebar-card-head">Tech Stack</div>
        <div class="sidebar-card-body">
          <div class="tag-cloud">
            @foreach ($project->tech_stack as $tech)
              <span class="s-tag">{{ $tech }}</span>
            @endforeach
          </div>
        </div>
      </div>
    @endif

    {{-- Categories --}}
    @if ($project->categories->isNotEmpty())
      <div class="sidebar-card reveal">
        <div class="sidebar-card-head">Categories</div>
        <div class="sidebar-card-body">
          <div class="tag-cloud">
            @foreach ($project->categories as $cat)
              <span class="s-tag">{{ $cat->name }}</span>
            @endforeach
          </div>
        </div>
      </div>
    @endif

    {{-- CTA --}}
    <div class="cta-sidebar reveal">
      <h4>Need something similar?</h4>
      <p>Tell us about your project. We'll get back to you within 24 hours.</p>
      <a href="mailto:hello@i2medier.com" class="btn-gold">Start a Project →</a>
    </div>

  </aside>

</div>

{{-- Next Project --}}
@if ($relatedProjects->isNotEmpty())
  @php $next = $relatedProjects->first() @endphp
  <div class="next-proj">
    <div class="next-proj-left">
      <span class="next-label">Next Case Study</span>
      <div class="next-title">{{ $next->title }}</div>
      @if ($next->summary)
        <p class="next-desc">{{ Str::limit($next->summary, 120) }}</p>
      @endif
    </div>
    <div class="next-proj-right">
      <a href="{{ route('portfolio.index') }}" class="btn-outline">← Back to Portfolio</a>
      <a href="{{ route('portfolio.show', $next) }}" class="btn-dark">Next Project →</a>
    </div>
  </div>
@else
  <div class="next-proj">
    <div class="next-proj-left">
      <span class="next-label">Explore more work</span>
      <div class="next-title">View all projects</div>
    </div>
    <div class="next-proj-right">
      <a href="{{ route('portfolio.index') }}" class="btn-dark">← Back to Portfolio</a>
    </div>
  </div>
@endif

{{-- CTA Band --}}
<section class="cta-band" id="contact">
  <h2>Ready to scale your business?</h2>
  <p>Tell us about your project and we'll get back to you within 24 hours.</p>
  <a href="{{ route('site.start') }}" class="btn-dark">Start Your Project →</a>
</section>

@endsection
