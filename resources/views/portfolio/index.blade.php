@extends('public.layouts.app')

@section('title', 'Portfolio — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/portfolio.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/portfolio-index.js')
@endpush

@php
  $gradients = [
    'linear-gradient(135deg,#0d0d14 0%,#141428 40%,#0d2040 100%)',
    'linear-gradient(150deg,#061208 0%,#0e2a15 45%,#0a1f10 100%)',
    'linear-gradient(135deg,#1a0a2e 0%,#2d1050 50%,#4a1a7a 100%)',
    'linear-gradient(135deg,#071a0f 0%,#0d3020 50%,#145230 100%)',
    'linear-gradient(135deg,#1a0f05 0%,#3a1e08 50%,#8a4a00 100%)',
    'linear-gradient(135deg,#0a0f1a 0%,#101830 50%,#162540 100%)',
    'linear-gradient(135deg,#1a0505 0%,#3a0808 50%,#5a0f0f 100%)',
    'linear-gradient(135deg,#050a1a 0%,#081020 50%,#0c1830 100%)',
  ];
@endphp

@section('content')
<div class="portfolio-page">
  <section class="hero">
    <div class="hero-glow"></div>
    <div class="hero-grid"></div>
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a>
      <span class="breadcrumb-sep">›</span>
      <span aria-current="page">Portfolio</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Our Work</span>
    <h1>Projects we're<br><em>proud of</em></h1>
    <p>A curated selection of platforms, products, and digital experiences we've built for clients across industries and continents.</p>
  </section>

  <section id="portfolio">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem;flex-wrap:wrap;gap:1rem">
      <div>
        <span class="s-label">Portfolio</span>
        <h2 class="s-head">Featured <em>work</em></h2>
      </div>
      <p style="font-size:0.85rem;color:var(--g400);font-style:italic;max-width:300px;text-align:right">Some projects are covered by NDA. Below is a selection we can share.</p>
    </div>

    <div class="filter-bar">
      <button class="filter-btn active" data-filter="all">
        All Projects <span class="f-count">{{ $projects->count() }}</span>
      </button>
      @foreach ($categories as $category)
        @if ($category->projects_count > 0)
          <button class="filter-btn" data-filter="{{ $category->slug }}">
            {{ $category->name }} <span class="f-count">{{ $category->projects_count }}</span>
          </button>
        @endif
      @endforeach
    </div>

    <div class="port-grid" id="portGrid">
      @forelse ($projects as $i => $project)
        @php
          $catSlugs  = $project->categories->pluck('slug')->join(',');
          $firstCat  = $project->categories->first();
          $badge     = $firstCat?->name ?? ucfirst($project->type);
          $gradient  = $gradients[$i % count($gradients)];
          $initials  = collect(explode(' ', $project->title))
                         ->map(fn($w) => strtoupper(mb_substr($w, 0, 1)))
                         ->take(2)
                         ->join('');
          $year      = $project->published_at?->year ?? now()->year;
          $clientLbl = $project->type === 'client' ? ($project->client_name ?: 'Client') : 'In-House Product';
          $mediaImages = collect([$project->featured_image])
                         ->merge($project->gallery ?? [])
                         ->filter()
                         ->unique()
                         ->values();

        @endphp
        <div class="port-card reveal" data-cats="{{ $catSlugs }}">
          <a href="{{ route('portfolio.show', $project) }}" class="port-thumb" style="background:{{ $project->featured_image ? '#0d0d14' : $gradient }}">
            <div class="port-thumb-inner">
              @if ($mediaImages->isNotEmpty())
                <div class="port-media-strip" aria-label="{{ e($project->title) }} preview gallery">
                  @foreach ($mediaImages as $image)
                    <div class="port-media-slide">
                      <img src="{{ $image }}" alt="{{ e($project->title) }}"
                           style="width:100%;height:100%;object-fit:cover;display:block;">
                    </div>
                  @endforeach
                </div>
              @else
                <div style="text-align:center;color:white;padding:2rem;position:relative;z-index:1">
                  <div style="font-family:var(--serif);font-size:2.4rem;font-weight:700;letter-spacing:-0.04em;opacity:.9;line-height:1">{{ $initials }}</div>
                  @if ($project->client_name)
                    <div style="font-size:0.6rem;letter-spacing:.18em;text-transform:uppercase;color:rgba(200,169,110,.6);margin-top:.5rem">{{ $project->client_name }}</div>
                  @endif
                  @if ($project->tech_stack && count($project->tech_stack))
                    <div style="margin-top:1rem;display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
                      @foreach (array_slice($project->tech_stack, 0, 3) as $tech)
                        <span style="padding:.2rem .55rem;border:1px solid rgba(255,255,255,.12);border-radius:3px;font-size:.6rem;color:rgba(255,255,255,.4);letter-spacing:.06em">{{ $tech }}</span>
                      @endforeach
                    </div>
                  @endif
                </div>
              @endif
            </div>
            <div class="port-overlay">
              <span class="port-cat-badge">{{ $badge }}</span>
              <span class="port-link-icon">↗</span>
            </div>
          </a>

          <div class="port-body">
            <div class="port-meta">
              <span class="port-type">{{ $project->type === 'inhouse' ? 'In-House' : 'Client Work' }}</span>
              <span class="port-year">{{ $year }}</span>
            </div>
            <a href="{{ route('portfolio.show', $project) }}" class="port-title">{{ $project->title }}</a>
            <p class="port-desc">{{ $project->summary }}</p>
            @if ($project->tech_stack && count($project->tech_stack))
              <div class="port-tags">
                @foreach ($project->tech_stack as $tech)
                  <span class="port-tag">{{ $tech }}</span>
                @endforeach
              </div>
            @endif
            <div class="port-footer">
              <span class="port-client">{{ $clientLbl }}</span>
              <a href="{{ route('portfolio.show', $project) }}" class="port-cta">
                View Case Study →
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="empty-state">
          <span>○</span>No projects published yet.
        </div>
      @endforelse
    </div>
  </section>

  <div class="stats-band">
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="stat-label">Projects</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="98">0</span><span style="color:var(--gold)">%</span></div>
      <div class="stat-label">Satisfaction</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="12">0</span><span>+</span></div>
      <div class="stat-label">Countries</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num" style="color:var(--gold)">24/7</div>
      <div class="stat-label">Support</div>
    </div>
  </div>

  <section class="cta-band" id="contact">
    <h2>Have a project in mind?</h2>
    <p>Tell us what you're building and we'll get back to you within 24 hours.</p>
    <a href="{{ route('site.start') }}" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
