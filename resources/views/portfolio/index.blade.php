<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | i2Medier</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4efe6] text-stone-900">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(14,116,144,0.12),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(217,119,6,0.12),_transparent_30%),linear-gradient(180deg,_#f4efe6_0%,_#ede3d2_100%)]">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="mb-14 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-4xl">
                    <p class="mb-4 text-xs uppercase tracking-[0.4em] text-cyan-800">Public Portfolio</p>
                    <h1 class="text-4xl font-semibold tracking-tight text-stone-950 sm:text-6xl">In-house products and selected client work, presented in one public portfolio.</h1>
                    <p class="mt-5 max-w-3xl text-base leading-8 text-stone-700">This portfolio is intentionally split into two public sections. `Inhouse` highlights i2Medier-built products. `Client` showcases selected work delivered for external clients.</p>
                </div>
                <div class="rounded-[1.75rem] border border-stone-900/10 bg-white/60 px-6 py-5 shadow-lg shadow-stone-900/5">
                    <p class="text-sm text-stone-600">Published projects</p>
                    <p class="mt-2 text-3xl font-semibold text-stone-950">{{ $inhouseProjects->count() + $clientProjects->count() }}</p>
                </div>
            </div>

            <section class="mb-16">
                <div class="mb-8">
                    <p class="text-xs uppercase tracking-[0.3em] text-cyan-800">Inhouse</p>
                    <h2 class="mt-2 text-3xl font-semibold text-stone-950">Products built in-house</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @forelse ($inhouseProjects as $project)
                        <article class="rounded-[1.8rem] border border-stone-900/10 bg-white/80 p-6 shadow-xl shadow-stone-900/5 transition hover:-translate-y-1">
                            <p class="mb-3 text-xs uppercase tracking-[0.25em] text-cyan-800">Inhouse</p>
                            <h3 class="mb-3 text-2xl font-semibold text-stone-950">{{ $project->title }}</h3>
                            <p class="mb-5 text-sm leading-7 text-stone-700">{{ $project->summary }}</p>
                            <div class="mb-5 flex flex-wrap gap-2">
                                @foreach (($project->tech_stack ?? []) as $tech)
                                    <span class="rounded-full bg-cyan-900/8 px-3 py-1 text-xs text-cyan-900">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('portfolio.show', $project) }}" class="text-sm font-medium text-cyan-900">View project</a>
                        </article>
                    @empty
                        <div class="rounded-[1.8rem] border border-dashed border-stone-900/15 bg-white/60 p-10 text-stone-700 md:col-span-2 xl:col-span-3">
                            No in-house projects published yet.
                        </div>
                    @endforelse
                </div>
            </section>

            <section>
                <div class="mb-8">
                    <p class="text-xs uppercase tracking-[0.3em] text-amber-700">Client</p>
                    <h2 class="mt-2 text-3xl font-semibold text-stone-950">Selected client work</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @forelse ($clientProjects as $project)
                        <article class="rounded-[1.8rem] border border-stone-900/10 bg-stone-950 p-6 text-stone-100 shadow-xl shadow-stone-900/15 transition hover:-translate-y-1">
                            <p class="mb-3 text-xs uppercase tracking-[0.25em] text-amber-300">{{ $project->client_name ?: 'Client Work' }}</p>
                            <h3 class="mb-3 text-2xl font-semibold text-white">{{ $project->title }}</h3>
                            <p class="mb-5 text-sm leading-7 text-stone-300">{{ $project->summary }}</p>
                            <div class="mb-5 flex flex-wrap gap-2">
                                @foreach (($project->tech_stack ?? []) as $tech)
                                    <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-stone-200">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('portfolio.show', $project) }}" class="text-sm font-medium text-amber-300">View project</a>
                        </article>
                    @empty
                        <div class="rounded-[1.8rem] border border-dashed border-stone-900/15 bg-white/60 p-10 text-stone-700 md:col-span-2 xl:col-span-3">
                            No client projects published yet.
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</body>
</html>
