@php
    $resolvedTitle = trim((string) ($seoTitle ?: $title ?: 'Untitled blog post'));
    $resolvedDescription = trim((string) ($seoDescription ?: $excerpt ?: 'Add a meta description or excerpt so search engines and readers get a clear summary.'));
    $resolvedSlug = trim((string) ($slug ?: \Illuminate\Support\Str::slug($title ?: 'blog-post')));
    $resolvedKeywords = array_values(array_filter((array) ($seoKeywords ?? [])));
    $editorContent = is_array($content ?? null) ? $content : null;
    $focusKeyword = trim((string) ($focusKeyphrase ?? ''));
    if (blank($focusKeyword)) {
        $focusKeyword = $resolvedKeywords[0] ?? null;
    }
    $bodyHtml = collect($editorContent['blocks'] ?? [])
        ->map(function (array $block): string {
            $type = $block['type'] ?? null;
            $data = $block['data'] ?? [];

            return match ($type) {
                'header' => sprintf(
                    '<h%s>%s</h%s>',
                    in_array((int) ($data['level'] ?? 2), [1, 2, 3, 4], true) ? (int) ($data['level'] ?? 2) : 2,
                    $data['text'] ?? '',
                    in_array((int) ($data['level'] ?? 2), [1, 2, 3, 4], true) ? (int) ($data['level'] ?? 2) : 2,
                ),
                'list' => collect($data['items'] ?? [])->isNotEmpty()
                    ? sprintf(
                        '<%1$s>%2$s</%1$s>',
                        ($data['style'] ?? 'unordered') === 'ordered' ? 'ol' : 'ul',
                        collect($data['items'] ?? [])->map(function ($item): string {
                            if (is_array($item)) {
                                return '<li>' . ($item['content'] ?? '') . '</li>';
                            }

                            return '<li>' . $item . '</li>';
                        })->implode(''),
                    )
                    : '',
                'quote' => '<blockquote><p>' . ($data['text'] ?? '') . '</p></blockquote>',
                'delimiter' => '<hr>',
                'code' => '<pre><code>' . ($data['code'] ?? '') . '</code></pre>',
                'checklist' => collect($data['items'] ?? [])->map(fn ($item) => '<p>' . (is_array($item) ? ($item['text'] ?? '') : $item) . '</p>')->implode(''),
                'imageBlock' => '<p>' . ($data['alt'] ?? '') . ' ' . ($data['caption'] ?? '') . '</p>',
                'galleryBlock' => '<p>' . ($data['title'] ?? '') . ' ' . ($data['caption'] ?? '') . '</p>',
                'alertBlock' => '<p>' . ($data['title'] ?? '') . ' ' . ($data['message'] ?? '') . '</p>',
                'buttonBlock' => '<p>' . ($data['label'] ?? '') . '</p>',
                'faqBlock' => collect($data['items'] ?? [])->map(fn ($item) => '<p>' . ($item['question'] ?? '') . ' ' . ($item['answer'] ?? '') . '</p>')->implode(''),
                'ctaBlock' => '<p>' . ($data['eyebrow'] ?? '') . ' ' . ($data['heading'] ?? '') . ' ' . ($data['text'] ?? '') . ' ' . ($data['buttonLabel'] ?? '') . '</p>',
                'pricingBlock' => collect($data['plans'] ?? [])->map(fn ($plan) => '<p>' . ($plan['name'] ?? '') . ' ' . ($plan['price'] ?? '') . ' ' . ($plan['description'] ?? '') . ' ' . implode(' ', $plan['features'] ?? []) . '</p>')->implode(''),
                'serviceCardsBlock' => collect($data['cards'] ?? [])->map(fn ($card) => '<p>' . ($card['title'] ?? '') . ' ' . ($card['text'] ?? '') . '</p>')->implode(''),
                default => '<p>' . ($data['text'] ?? '') . '</p>',
            };
        })
        ->implode('');
    $bodyText = trim(preg_replace('/\s+/', ' ', strip_tags($bodyHtml)));
    $wordCount = str_word_count($bodyText);
    preg_match('/<p[^>]*>(.*?)<\/p>/is', $bodyHtml, $firstParagraphMatch);
    $firstParagraph = trim(preg_replace('/\s+/', ' ', strip_tags($firstParagraphMatch[1] ?? '')));
    preg_match_all('/<h2\b[^>]*>(.*?)<\/h2>/is', $bodyHtml, $h2Matches);
    preg_match_all('/<h3\b[^>]*>(.*?)<\/h3>/is', $bodyHtml, $h3Matches);
    preg_match_all('/<a\b[^>]*href=["\']([^"\']+)["\'][^>]*>/i', $bodyHtml, $linkMatches);
    preg_match_all('/<img\b[^>]*>/i', $bodyHtml, $imageMatches);
    preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $bodyHtml, $paragraphMatches);

    $links = $linkMatches[1] ?? [];
    $appUrl = rtrim(url('/'), '/');
    $internalLinks = collect($links)->filter(fn (string $href): bool => str_starts_with($href, '/') || str_starts_with($href, $appUrl))->count();
    $externalLinks = collect($links)->filter(fn (string $href): bool => str_starts_with($href, 'http://') || str_starts_with($href, 'https://'))->filter(fn (string $href): bool => ! str_starts_with($href, $appUrl))->count();

    $imageTags = $imageMatches[0] ?? [];
    $imagesWithoutAlt = collect($imageTags)->filter(function (string $tag): bool {
        if (! preg_match('/\balt=["\']([^"\']*)["\']/i', $tag, $altMatch)) {
            return true;
        }

        return blank(trim($altMatch[1]));
    })->count();

    $titleLength = \Illuminate\Support\Str::length($resolvedTitle);
    $descriptionLength = \Illuminate\Support\Str::length($resolvedDescription);
    $slugLength = \Illuminate\Support\Str::length($resolvedSlug);
    $sentences = array_values(array_filter(array_map('trim', preg_split('/[.!?]+/', $bodyText ?: ''))));
    $sentenceCount = count($sentences);
    $averageSentenceLength = $sentenceCount > 0
        ? round(collect($sentences)->map(fn (string $sentence): int => str_word_count($sentence))->avg() ?? 0)
        : 0;
    $paragraphWordCounts = collect($paragraphMatches[1] ?? [])
        ->map(fn (string $paragraph): int => str_word_count(trim(preg_replace('/\s+/', ' ', strip_tags($paragraph)))))
        ->filter(fn (int $words): bool => $words > 0)
        ->values();
    $longestParagraphLength = $paragraphWordCounts->max() ?? 0;
    preg_match_all('/\b(?:is|are|was|were|be|been|being)\s+\w+(?:ed|en)\b/i', $bodyText, $passiveMatches);
    $passiveCount = count($passiveMatches[0] ?? []);
    $passiveRatio = $sentenceCount > 0 ? round(($passiveCount / $sentenceCount) * 100) : 0;

    $checks = [
        [
            'label' => 'SEO title length',
            'state' => ($titleLength >= 30 && $titleLength <= 60) ? 'good' : (($titleLength > 0) ? 'warn' : 'bad'),
            'message' => "{$titleLength} characters. Aim for 30-60 for stronger search display.",
        ],
        [
            'label' => 'Meta description length',
            'state' => ($descriptionLength >= 120 && $descriptionLength <= 155) ? 'good' : (($descriptionLength >= 70) ? 'warn' : 'bad'),
            'message' => "{$descriptionLength} characters. Aim for 120-155 with a strong promise.",
        ],
        [
            'label' => 'Slug readability',
            'state' => (filled($resolvedSlug) && $slugLength <= 75) ? 'good' : (filled($resolvedSlug) ? 'warn' : 'bad'),
            'message' => filled($resolvedSlug) ? "{$slugLength} characters. Keep it short and keyword-focused." : 'Add a slug so the URL stays clean.',
        ],
        [
            'label' => 'Focus keyword',
            'state' => filled($focusKeyword) ? 'good' : 'bad',
            'message' => filled($focusKeyword) ? "Primary focus keyword: {$focusKeyword}" : 'Add at least one focus keyword.',
        ],
        [
            'label' => 'Keyword in title',
            'state' => (filled($focusKeyword) && \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($resolvedTitle), \Illuminate\Support\Str::lower($focusKeyword))) ? 'good' : 'warn',
            'message' => filled($focusKeyword) ? 'Use the main keyword naturally in the SEO title.' : 'Set a focus keyword first.',
        ],
        [
            'label' => 'Keyword in first paragraph',
            'state' => (filled($focusKeyword) && filled($firstParagraph) && \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($firstParagraph), \Illuminate\Support\Str::lower($focusKeyword))) ? 'good' : 'warn',
            'message' => filled($focusKeyword) ? 'Mention the focus keyword naturally near the start of the article.' : 'Set a focus keyword first.',
        ],
        [
            'label' => 'Body length',
            'state' => $wordCount >= 600 ? 'good' : ($wordCount >= 300 ? 'warn' : 'bad'),
            'message' => "{$wordCount} words. Aim for 600+ for stronger topical coverage on most strategic posts.",
        ],
        [
            'label' => 'Sentence length',
            'state' => $averageSentenceLength > 0 && $averageSentenceLength <= 20 ? 'good' : ($averageSentenceLength <= 28 ? 'warn' : 'bad'),
            'message' => $averageSentenceLength > 0
                ? "Average sentence length is {$averageSentenceLength} words. Shorter sentences are easier to scan."
                : 'Add body copy so readability checks can run.',
        ],
        [
            'label' => 'Paragraph length',
            'state' => $longestParagraphLength > 0 && $longestParagraphLength <= 120 ? 'good' : ($longestParagraphLength <= 180 ? 'warn' : 'bad'),
            'message' => $longestParagraphLength > 0
                ? "Longest paragraph is {$longestParagraphLength} words. Break dense blocks into smaller chunks."
                : 'Add paragraph structure so readers can scan more easily.',
        ],
        [
            'label' => 'Passive voice',
            'state' => $sentenceCount === 0 ? 'warn' : ($passiveRatio <= 10 ? 'good' : ($passiveRatio <= 20 ? 'warn' : 'bad')),
            'message' => $sentenceCount > 0
                ? "{$passiveCount} possible passive-voice phrase(s) found, about {$passiveRatio}% of sentences. Use active voice where it improves clarity."
                : 'Add body copy so the panel can estimate writing clarity.',
        ],
        [
            'label' => 'Heading structure',
            'state' => (count($h2Matches[0] ?? []) >= 2) ? 'good' : ((count($h2Matches[0] ?? []) >= 1 || count($h3Matches[0] ?? []) >= 2) ? 'warn' : 'bad'),
            'message' => count($h2Matches[0] ?? []) . ' H2s and ' . count($h3Matches[0] ?? []) . ' H3s detected. Break long copy into scannable sections.',
        ],
        [
            'label' => 'Internal links',
            'state' => $internalLinks >= 1 ? 'good' : 'warn',
            'message' => "{$internalLinks} internal links found. Add links to related services, case studies, or other blog posts.",
        ],
        [
            'label' => 'External links',
            'state' => $externalLinks >= 1 ? 'good' : 'warn',
            'message' => "{$externalLinks} external links found. Cite credible sources where it strengthens trust.",
        ],
        [
            'label' => 'Image alt text',
            'state' => count($imageTags) === 0 ? 'warn' : ($imagesWithoutAlt === 0 ? 'good' : 'bad'),
            'message' => count($imageTags) === 0
                ? 'No images found. That is okay for some posts, but visuals can improve engagement.'
                : ($imagesWithoutAlt === 0
                    ? 'All detected images include alt text.'
                    : "{$imagesWithoutAlt} image(s) are missing alt text."),
        ],
    ];

    $rawScore = 0;
    foreach ($checks as $check) {
        $rawScore += match ($check['state']) {
            'good' => 10,
            'warn' => 5,
            default => 0,
        };
    }
    $score = count($checks) > 0 ? (int) round(($rawScore / (count($checks) * 10)) * 100) : 0;

    $scoreLabel = match (true) {
        $score >= 80 => 'Strong',
        $score >= 55 => 'Okay',
        default => 'Needs work',
    };
@endphp

<div class="rounded-2xl border border-stone-200 bg-white p-4 shadow-sm dark:border-white/10 dark:bg-white/5">
    <div class="mb-4 flex items-center justify-between gap-3">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-amber-600">SEO Overview</p>
            <h3 class="mt-1 text-sm font-semibold text-stone-900 dark:text-white">Yoast-style snippet and checks</h3>
        </div>
        <div class="rounded-full border border-stone-200 px-3 py-1 text-xs font-semibold {{ $score >= 80 ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300' : ($score >= 55 ? 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-300' : 'bg-rose-50 text-rose-700 dark:bg-rose-500/10 dark:text-rose-300') }}">
            {{ $scoreLabel }} · {{ $score }}/100
        </div>
    </div>

    <div class="mb-4 rounded-xl border border-stone-200 bg-stone-50 p-4 dark:border-white/10 dark:bg-stone-950/40">
        <div class="mb-2 text-[11px] uppercase tracking-[0.18em] text-stone-500 dark:text-stone-400">Google preview</div>
        <div class="space-y-1">
            <div class="line-clamp-2 text-[19px] leading-6 text-[#1a0dab] dark:text-blue-300">{{ $resolvedTitle }}</div>
            <div class="text-[13px] text-[#006621] dark:text-emerald-300">{{ url('/blog') }}/{{ $resolvedSlug }}</div>
            <div class="text-[13px] leading-5 text-stone-600 dark:text-stone-300">{{ $resolvedDescription }}</div>
        </div>
    </div>

    <div class="space-y-2">
        @foreach ($checks as $check)
            <div class="flex items-start gap-3 rounded-xl border border-stone-200/80 bg-white px-3 py-3 dark:border-white/10 dark:bg-white/5">
                <span class="mt-0.5 inline-flex h-2.5 w-2.5 flex-shrink-0 rounded-full {{ $check['state'] === 'good' ? 'bg-emerald-500' : ($check['state'] === 'warn' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                <div class="min-w-0">
                    <div class="text-sm font-medium text-stone-900 dark:text-white">{{ $check['label'] }}</div>
                    <div class="mt-1 text-xs leading-5 text-stone-500 dark:text-stone-400">{{ $check['message'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
