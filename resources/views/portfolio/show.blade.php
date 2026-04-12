<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} | Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-950 text-stone-100">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(8,145,178,0.16),_transparent_28%),linear-gradient(180deg,_#111827_0%,_#020617_100%)]">
        <div class="mx-auto max-w-5xl px-6 py-12">
            <a href="{{ route('portfolio.index') }}" class="mb-8 inline-flex text-sm text-cyan-300">Back to portfolio</a>
            <article class="rounded-[2rem] border border-white/10 bg-white/5 p-8 lg:p-10">
                <div class="mb-4 flex flex-wrap gap-3 text-xs uppercase tracking-[0.25em] text-amber-300">
                    <span>{{ $project->type === 'inhouse' ? 'Inhouse' : 'Client' }}</span>
                    @if ($project->client_name)
                        <span>{{ $project->client_name }}</span>
                    @endif
                </div>
                <h1 class="mb-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">{{ $project->title }}</h1>
                <p class="mb-8 max-w-3xl text-base leading-8 text-stone-300">{{ $project->summary }}</p>
                <div class="mb-8 flex flex-wrap gap-2">
                    @foreach (($project->tech_stack ?? []) as $tech)
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-stone-200">{{ $tech }}</span>
                    @endforeach
                </div>
                @if ($project->project_url)
                    <div class="mb-10">
                        <a href="{{ $project->project_url }}" target="_blank" rel="noreferrer" class="inline-flex rounded-full bg-cyan-300 px-5 py-3 text-sm font-medium text-stone-950">Visit project</a>
                    </div>
                @endif
                <div class="prose prose-invert max-w-none prose-headings:text-white prose-p:text-stone-200 prose-a:text-cyan-300">
                    {!! nl2br(e($project->description)) !!}
                </div>
            </article>
            @if ($relatedProjects->isNotEmpty())
                <section class="mt-12">
                    <h2 class="mb-6 text-2xl font-semibold text-white">Related Work</h2>
                    <div class="grid gap-6 md:grid-cols-3">
                        @foreach ($relatedProjects as $relatedProject)
                            <article class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                                <p class="mb-2 text-xs uppercase tracking-[0.25em] text-amber-300">{{ $relatedProject->type === 'inhouse' ? 'Inhouse' : ($relatedProject->client_name ?: 'Client') }}</p>
                                <h3 class="mb-3 text-lg font-semibold text-white">{{ $relatedProject->title }}</h3>
                                <p class="mb-4 text-sm leading-7 text-stone-300">{{ $relatedProject->summary }}</p>
                                <a href="{{ route('portfolio.show', $relatedProject) }}" class="text-sm text-cyan-300">Open project</a>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</body>
</html>
