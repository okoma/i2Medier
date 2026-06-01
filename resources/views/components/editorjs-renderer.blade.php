@php
    use App\View\Components\EditorjsRenderer;
@endphp

@foreach ($blocks as $index => $block)
    @php
        $type = $block['type'] ?? null;
        $data = $block['data'] ?? [];
    @endphp

    @if ($type === 'header')
        @php
            $level = in_array((int) ($data['level'] ?? 2), [1, 2, 3, 4], true) ? (int) ($data['level'] ?? 2) : 2;
            $headingId = $level === 2 ? EditorjsRenderer::headingId(($data['text'] ?? '') . '-' . $index) : null;
        @endphp
        <h{{ $level }} @if($headingId) id="{{ $headingId }}" @endif>{!! $data['text'] ?? '' !!}</h{{ $level }}>
    @elseif ($type === 'list')
        @php
            $tag = ($data['style'] ?? 'unordered') === 'ordered' ? 'ol' : 'ul';
        @endphp
        {!! '<' . $tag . '>' . EditorjsRenderer::renderListItems($data['items'] ?? [], $tag) . '</' . $tag . '>' !!}
    @elseif ($type === 'quote')
        <blockquote>
            <p>{!! $data['text'] ?? '' !!}</p>
            @if (filled($data['caption'] ?? null))
                <cite>{{ $data['caption'] }}</cite>
            @endif
        </blockquote>
    @elseif ($type === 'checklist')
        <ul class="editorjs-checklist">
            @foreach (($data['items'] ?? []) as $item)
                <li class="{{ !empty($item['checked']) ? 'is-checked' : '' }}">
                    <span class="check"></span>
                    <span>{!! is_array($item) ? ($item['text'] ?? '') : $item !!}</span>
                </li>
            @endforeach
        </ul>
    @elseif ($type === 'code')
        <pre class="editorjs-code"><code>{{ $data['code'] ?? '' }}</code></pre>
    @elseif ($type === 'table')
        <div class="editorjs-table-wrap">
            <table class="editorjs-table">
                @foreach (($data['content'] ?? []) as $rowIndex => $row)
                    <tr>
                        @foreach (($row ?? []) as $cell)
                            @if ($rowIndex === 0 && !empty($data['withHeadings']))
                                <th>{!! $cell !!}</th>
                            @else
                                <td>{!! $cell !!}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($type === 'embed')
        <div class="editorjs-embed">
            @if (!empty($data['embed']))
                <div class="editorjs-embed-frame">
                    <iframe src="{{ $data['embed'] }}" loading="lazy" allowfullscreen></iframe>
                </div>
            @endif
            @if (filled($data['caption'] ?? null))
                <p class="editorjs-embed-caption">{{ $data['caption'] }}</p>
            @endif
        </div>
    @elseif ($type === 'imageBlock')
        <figure class="editorjs-image">
            @if (filled($data['url'] ?? null))
                <img src="{{ $data['url'] }}" alt="{{ $data['alt'] ?? '' }}" loading="lazy">
            @endif
            @if (filled($data['caption'] ?? null))
                <figcaption>{{ $data['caption'] }}</figcaption>
            @endif
        </figure>
    @elseif ($type === 'galleryBlock')
        <section class="editorjs-gallery">
            @if (filled($data['title'] ?? null))
                <h3>{{ $data['title'] }}</h3>
            @endif
            <div class="editorjs-gallery-grid">
                @foreach (($data['images'] ?? []) as $image)
                    <figure><img src="{{ $image }}" alt="" loading="lazy"></figure>
                @endforeach
            </div>
            @if (filled($data['caption'] ?? null))
                <p class="editorjs-gallery-caption">{{ $data['caption'] }}</p>
            @endif
        </section>
    @elseif ($type === 'alertBlock')
        @php
            $tone = $data['tone'] ?? 'info';
            $alertIcons = [
                'info'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M12 8v1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M12 11v5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
                'success' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="m8.5 12 2.5 2.5 4.5-4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'warning' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 2 21h20L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M12 9v5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="17.5" r="1" fill="currentColor"/></svg>',
                'danger'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="m9 9 6 6M15 9l-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
            ];
        @endphp
        <div class="editorjs-alert tone-{{ $tone }}">
            <span class="editorjs-alert-ico">{!! $alertIcons[$tone] ?? $alertIcons['info'] !!}</span>
            <div class="editorjs-alert-content">
                @if (filled($data['title'] ?? null))
                    <strong>{{ $data['title'] }}</strong>
                @endif
                @if (filled($data['message'] ?? null))
                    <p>{{ $data['message'] }}</p>
                @endif
            </div>
        </div>
    @elseif ($type === 'buttonBlock')
        <div class="editorjs-button-wrap">
            <a href="{{ $data['url'] ?? '#' }}" class="editorjs-button style-{{ $data['style'] ?? 'primary' }}">
                {{ $data['label'] ?? 'Learn More' }}
            </a>
        </div>
    @elseif ($type === 'faqBlock')
        <section class="editorjs-faq">
            @if (filled($data['title'] ?? null))
                <h3>{{ $data['title'] }}</h3>
            @endif
            <div class="editorjs-faq-list">
                @foreach (($data['items'] ?? []) as $item)
                    <details>
                        <summary>{{ $item['question'] ?? '' }}</summary>
                        <div>{{ $item['answer'] ?? '' }}</div>
                    </details>
                @endforeach
            </div>
        </section>
    @elseif ($type === 'ctaBlock')
        <section class="editorjs-cta">
            @if (filled($data['eyebrow'] ?? null))
                <span class="editorjs-cta-eyebrow">{{ $data['eyebrow'] }}</span>
            @endif
            @if (filled($data['heading'] ?? null))
                <h3>{{ $data['heading'] }}</h3>
            @endif
            @if (filled($data['text'] ?? null))
                <p>{{ $data['text'] }}</p>
            @endif
            @if (filled($data['buttonLabel'] ?? null))
                <a href="{{ $data['buttonUrl'] ?? '#' }}" class="editorjs-button style-primary">{{ $data['buttonLabel'] }}</a>
            @endif
        </section>
    @elseif ($type === 'pricingBlock')
        <section class="editorjs-pricing">
            @if (filled($data['title'] ?? null))
                <h3>{{ $data['title'] }}</h3>
            @endif
            @if (filled($data['subtitle'] ?? null))
                <p class="editorjs-pricing-sub">{{ $data['subtitle'] }}</p>
            @endif
            <div class="editorjs-pricing-grid">
                @foreach (($data['plans'] ?? []) as $plan)
                    <article class="editorjs-price-card">
                        <h4>{{ $plan['name'] ?? '' }}</h4>
                        <div class="price">{{ $plan['price'] ?? '' }}</div>
                        @if (filled($plan['description'] ?? null))
                            <p>{{ $plan['description'] }}</p>
                        @endif
                        @if (!empty($plan['features']))
                            <ul>
                                @foreach ($plan['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </article>
                @endforeach
            </div>
        </section>
    @elseif ($type === 'serviceCardsBlock')
        <section class="editorjs-service-cards">
            @if (filled($data['title'] ?? null))
                <h3>{{ $data['title'] }}</h3>
            @endif
            <div class="editorjs-service-grid">
                @foreach (($data['cards'] ?? []) as $card)
                    <article class="editorjs-service-card">
                        <h4>{{ $card['title'] ?? '' }}</h4>
                        @if (filled($card['text'] ?? null))
                            <p>{{ $card['text'] }}</p>
                        @endif
                        @if (filled($card['url'] ?? null))
                            <a href="{{ $card['url'] }}">Learn more</a>
                        @endif
                    </article>
                @endforeach
            </div>
        </section>
    @elseif ($type === 'statCalloutBlock')
        <div class="stat-callout">
            <div class="stat-callout-num">{{ $data['stat'] ?? '' }}</div>
            <div class="stat-callout-text"><p>{!! nl2br(e($data['label'] ?? '')) !!}</p></div>
        </div>
    @elseif ($type === 'compareBlock')
        <div class="speed-compare">
            <div class="speed-card bad">
                <div class="speed-card-label">{{ $data['leftLabel'] ?? '' }}</div>
                <div class="speed-score">{{ $data['leftScore'] ?? '' }}</div>
                <div class="speed-bar-wrap"><div class="speed-bar"></div></div>
                <p class="speed-desc">{{ $data['leftDesc'] ?? '' }}</p>
            </div>
            <div class="speed-card good">
                <div class="speed-card-label">{{ $data['rightLabel'] ?? '' }}</div>
                <div class="speed-score">{{ $data['rightScore'] ?? '' }}</div>
                <div class="speed-bar-wrap"><div class="speed-bar"></div></div>
                <p class="speed-desc">{{ $data['rightDesc'] ?? '' }}</p>
            </div>
        </div>
    @elseif ($type === 'proConListBlock')
        @php $listClass = ($data['type'] ?? 'check') === 'cross' ? 'crosslist' : 'checklist'; @endphp
        <ul class="{{ $listClass }}">
            @foreach (($data['items'] ?? []) as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @elseif ($type === 'challengeGridBlock')
        <div class="editorjs-challenge-grid">
            @foreach (($data['cards'] ?? []) as $card)
                <div class="editorjs-ch-card {{ ($card['variant'] ?? 'light') === 'dark' ? 'dark' : '' }}">
                    @if (filled($card['icon'] ?? null))<div class="editorjs-ch-ico">{!! EditorjsRenderer::svgIcon($card['icon']) !!}</div>@endif
                    @if (filled($card['title'] ?? null))<h4>{{ $card['title'] }}</h4>@endif
                    @if (filled($card['desc'] ?? null))<p>{{ $card['desc'] }}</p>@endif
                </div>
            @endforeach
        </div>
    @elseif ($type === 'processStepsBlock')
        <div class="editorjs-process-list">
            @foreach (($data['steps'] ?? []) as $stepIndex => $step)
                <div class="editorjs-process-step">
                    <div class="editorjs-step-num{{ $stepIndex === 0 ? ' gold' : '' }}">{{ str_pad((string) ($stepIndex + 1), 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="editorjs-step-body">
                        @if (filled($step['title'] ?? null))<div class="editorjs-step-title">{{ $step['title'] }}</div>@endif
                        @if (filled($step['desc'] ?? null))<p class="editorjs-step-desc">{{ $step['desc'] }}</p>@endif
                    </div>
                </div>
            @endforeach
        </div>
    @elseif ($type === 'techStackBlock')
        <div class="editorjs-tech-grid">
            @foreach (($data['chips'] ?? []) as $chip)
                <div class="editorjs-tech-chip">
                    @if (filled($chip['icon'] ?? null))<span class="editorjs-tech-ico">{!! EditorjsRenderer::svgIcon($chip['icon']) !!}</span>@endif
                    <div>
                        <div class="editorjs-tech-label">{{ $chip['name'] ?? '' }}</div>
                        @if (filled($chip['role'] ?? null))<div class="editorjs-tech-role">{{ $chip['role'] }}</div>@endif
                    </div>
                </div>
            @endforeach
        </div>
    @elseif ($type === 'featureGridBlock')
        <div class="editorjs-feat-list">
            @foreach (($data['items'] ?? []) as $featItem)
                <div class="editorjs-feat-item">
                    <div class="editorjs-feat-ico">{!! EditorjsRenderer::svgIcon($featItem['icon'] ?? 'information-circle') !!}</div>
                    <div class="editorjs-feat-body">
                        @if (filled($featItem['title'] ?? null))<h5>{{ $featItem['title'] }}</h5>@endif
                        @if (filled($featItem['desc'] ?? null))<p>{{ $featItem['desc'] }}</p>@endif
                    </div>
                </div>
            @endforeach
        </div>
    @elseif ($type === 'screensGridBlock')
        <div class="editorjs-screens-grid">
            @foreach (($data['screens'] ?? []) as $screen)
                <div class="editorjs-screen-card">
                    @if (filled($screen['url'] ?? null))
                        <img src="{{ $screen['url'] }}" alt="{{ $screen['label'] ?? '' }}" loading="lazy">
                    @else
                        <div class="editorjs-screen-placeholder"></div>
                    @endif
                    @if (filled($screen['label'] ?? null))<span class="editorjs-screen-label">{{ $screen['label'] }}</span>@endif
                </div>
            @endforeach
        </div>
    @elseif ($type === 'impactStatsBlock')
        <div class="editorjs-impact-grid">
            @foreach (($data['stats'] ?? []) as $stat)
                <div class="editorjs-impact-item">
                    <div class="editorjs-impact-num">{{ $stat['number'] ?? '' }}<span>{{ $stat['suffix'] ?? '' }}</span></div>
                    <div class="editorjs-impact-label">{{ $stat['label'] ?? '' }}</div>
                </div>
            @endforeach
        </div>
    @elseif ($type === 'lessonsListBlock')
        <div class="editorjs-lessons-list">
            @foreach (($data['items'] ?? []) as $lesson)
                <div class="editorjs-lesson-item">
                    @if (filled($lesson['icon'] ?? null))<span class="editorjs-lesson-ico">{!! EditorjsRenderer::svgIcon($lesson['icon']) !!}</span>@endif
                    <div class="editorjs-lesson-body">{!! preg_replace('/\*\*(.*?)\*\*/u', '<strong>$1</strong>', e($lesson['body'] ?? '')) !!}</div>
                </div>
            @endforeach
        </div>
    @elseif ($type === 'delimiter')
        <hr>
    @else
        <p>{!! $data['text'] ?? '' !!}</p>
    @endif
@endforeach
