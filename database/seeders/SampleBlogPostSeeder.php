<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class SampleBlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        $category = BlogCategory::first();

        BlogPost::updateOrCreate(
            ['slug' => 'block-design-preview'],
            [
                'author_id'       => $author?->id,
                'category_id'     => $category?->id,
                'title'           => 'Block Design Preview — Every Block Type',
                'excerpt'         => 'A sample post that renders every available EditorJS block so you can review and tweak the public-facing design.',
                'status'          => 'published',
                'published_at'    => now(),
                'is_featured'     => true,
                'read_time'       => 6,
                'view_count'      => 0,
                'seo_title'       => 'Block Design Preview',
                'seo_description' => 'Sample post showing every EditorJS block type rendered on the public blog.',
                'focus_keyphrase' => 'block design preview',
                'seo_keywords'    => ['blocks', 'editorjs', 'design'],
                'content'         => [
                    'time'    => now()->timestamp * 1000,
                    'version' => '2.31.6',
                    'blocks'  => [

                        // ── Paragraph ──────────────────────────────────────────
                        [
                            'type' => 'paragraph',
                            'data' => [
                                'text' => 'This post exists to show every block type side-by-side so you can review and refine the design. Each section below exercises a different block. Feel free to edit, delete, or re-order after seeding.',
                            ],
                        ],

                        // ── H2 ─────────────────────────────────────────────────
                        [
                            'type' => 'header',
                            'data' => ['level' => 2, 'text' => 'H2 Section — Web Performance Matters'],
                        ],

                        // ── H3 ─────────────────────────────────────────────────
                        [
                            'type' => 'header',
                            'data' => ['level' => 3, 'text' => 'H3 Sub-section — Core Web Vitals'],
                        ],

                        // ── H4 ─────────────────────────────────────────────────
                        [
                            'type' => 'header',
                            'data' => ['level' => 4, 'text' => 'H4 Detail — Largest Contentful Paint'],
                        ],

                        // ── Paragraph with inline styles ───────────────────────
                        [
                            'type' => 'paragraph',
                            'data' => [
                                'text' => 'Google ranks pages partly on <b>speed</b> and <i>usability</i>. A site scoring 90+ on PageSpeed not only <mark class="cdx-marker">converts better</mark> but also earns more organic impressions over time.',
                            ],
                        ],

                        // ── Unordered List ─────────────────────────────────────
                        [
                            'type' => 'list',
                            'data' => [
                                'style' => 'unordered',
                                'items' => [
                                    'Reduce server response time (TTFB < 200 ms)',
                                    'Compress and lazy-load all images',
                                    'Eliminate render-blocking scripts',
                                    'Use a CDN for static assets',
                                ],
                            ],
                        ],

                        // ── Ordered List ───────────────────────────────────────
                        [
                            'type' => 'list',
                            'data' => [
                                'style' => 'ordered',
                                'items' => [
                                    'Run a Lighthouse audit',
                                    'Fix the top three issues',
                                    'Deploy and re-test',
                                    'Monitor with Real User Monitoring (RUM)',
                                ],
                            ],
                        ],

                        // ── Quote ──────────────────────────────────────────────
                        [
                            'type' => 'quote',
                            'data' => [
                                'text'    => 'A one-second delay in page load can reduce conversions by up to 7%.',
                                'caption' => 'Akamai Research',
                            ],
                        ],

                        // ── Checklist ──────────────────────────────────────────
                        [
                            'type' => 'checklist',
                            'data' => [
                                'items' => [
                                    ['text' => 'Enable HTTPS everywhere', 'checked' => true],
                                    ['text' => 'Minify CSS and JavaScript', 'checked' => true],
                                    ['text' => 'Set up browser caching headers', 'checked' => false],
                                    ['text' => 'Implement HTTP/2 or HTTP/3', 'checked' => false],
                                ],
                            ],
                        ],

                        // ── Code ───────────────────────────────────────────────
                        [
                            'type' => 'code',
                            'data' => [
                                'code' => "// Measure LCP with the PerformanceObserver API\nnew PerformanceObserver((list) => {\n  const entries = list.getEntries();\n  const last = entries[entries.length - 1];\n  console.log('LCP:', last.startTime, 'ms');\n}).observe({ type: 'largest-contentful-paint', buffered: true });",
                            ],
                        ],

                        // ── Table ──────────────────────────────────────────────
                        [
                            'type' => 'table',
                            'data' => [
                                'withHeadings' => true,
                                'content' => [
                                    ['Metric', 'Good', 'Needs Improvement', 'Poor'],
                                    ['LCP', '< 2.5 s', '2.5 – 4 s', '> 4 s'],
                                    ['FID', '< 100 ms', '100 – 300 ms', '> 300 ms'],
                                    ['CLS', '< 0.1', '0.1 – 0.25', '> 0.25'],
                                ],
                            ],
                        ],

                        // ── Delimiter ──────────────────────────────────────────
                        ['type' => 'delimiter', 'data' => []],

                        // ── Alert — info ───────────────────────────────────────
                        [
                            'type' => 'alertBlock',
                            'data' => [
                                'tone'    => 'info',
                                'title'   => 'Pro Tip',
                                'message' => 'Use the Chrome DevTools Coverage tab to identify unused CSS and JavaScript that is slowing your page down.',
                            ],
                        ],

                        // ── Alert — success ────────────────────────────────────
                        [
                            'type' => 'alertBlock',
                            'data' => [
                                'tone'    => 'success',
                                'title'   => 'Done!',
                                'message' => 'Your site is scoring 95+ on PageSpeed. Visitors will notice the difference immediately.',
                            ],
                        ],

                        // ── Alert — warning ────────────────────────────────────
                        [
                            'type' => 'alertBlock',
                            'data' => [
                                'tone'    => 'warning',
                                'title'   => 'Watch Out',
                                'message' => 'Third-party scripts from analytics, chat widgets, and ad networks can quietly tank your performance score.',
                            ],
                        ],

                        // ── Alert — danger ─────────────────────────────────────
                        [
                            'type' => 'alertBlock',
                            'data' => [
                                'tone'    => 'danger',
                                'title'   => 'Critical Issue',
                                'message' => 'Your server is responding in over 1.5 seconds. Fix TTFB before optimising anything else.',
                            ],
                        ],

                        // ── Stat Callout ───────────────────────────────────────
                        [
                            'type' => 'statCalloutBlock',
                            'data' => [
                                'stat'  => '3.2×',
                                'label' => "More organic traffic\nafter reaching a 90+ PageSpeed score",
                            ],
                        ],

                        // ── Compare ────────────────────────────────────────────
                        [
                            'type' => 'compareBlock',
                            'data' => [
                                'leftLabel'  => 'Before Optimisation',
                                'leftScore'  => '42 / 100',
                                'leftDesc'   => 'Uncompressed images, render-blocking JS, no caching.',
                                'rightLabel' => 'After Optimisation',
                                'rightScore' => '96 / 100',
                                'rightDesc'  => 'WebP images, deferred scripts, CDN, browser cache.',
                            ],
                        ],

                        // ── Pro/Con List — check ───────────────────────────────
                        [
                            'type' => 'header',
                            'data' => ['level' => 3, 'text' => 'Why Invest in Performance?'],
                        ],
                        [
                            'type' => 'proConListBlock',
                            'data' => [
                                'type'  => 'check',
                                'items' => [
                                    'Higher Google rankings',
                                    'Lower bounce rate',
                                    'Better conversion rate',
                                    'Reduced hosting costs via caching',
                                ],
                            ],
                        ],

                        // ── Pro/Con List — cross ───────────────────────────────
                        [
                            'type' => 'proConListBlock',
                            'data' => [
                                'type'  => 'cross',
                                'items' => [
                                    'Slow sites lose 40% of visitors after 3 seconds',
                                    'Google penalises poor Core Web Vitals in rankings',
                                    'High server costs from unoptimised assets',
                                ],
                            ],
                        ],

                        // ── Image Block ────────────────────────────────────────
                        [
                            'type' => 'imageBlock',
                            'data' => [
                                'url'     => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1200&q=80',
                                'alt'     => 'Developer looking at code on a monitor',
                                'caption' => 'A developer reviewing performance metrics — photo by Unsplash',
                            ],
                        ],

                        // ── Gallery Block ──────────────────────────────────────
                        [
                            'type' => 'galleryBlock',
                            'data' => [
                                'title'   => 'Before & After Screenshots',
                                'caption' => 'PageSpeed Insights reports from a real client project.',
                                'images'  => [
                                    'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&q=80',
                                    'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&q=80',
                                    'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&q=80',
                                ],
                            ],
                        ],

                        // ── Embed ──────────────────────────────────────────────
                        [
                            'type' => 'embed',
                            'data' => [
                                'embed'   => 'https://www.youtube.com/embed/reUZRyXxUs4',
                                'caption' => 'Google I/O talk: Core Web Vitals in practice',
                            ],
                        ],

                        // ── FAQ Block ──────────────────────────────────────────
                        [
                            'type' => 'faqBlock',
                            'data' => [
                                'title' => 'Frequently Asked Questions',
                                'items' => [
                                    [
                                        'question' => 'How long does a performance audit take?',
                                        'answer'   => 'A basic Lighthouse audit takes minutes. A thorough audit with fixes typically spans one to three working days depending on site complexity.',
                                    ],
                                    [
                                        'question' => 'Will optimising images hurt their quality?',
                                        'answer'   => 'No. Modern formats like WebP and AVIF deliver the same visual quality at 30–50% smaller file sizes. The difference is invisible to visitors.',
                                    ],
                                    [
                                        'question' => 'Do I need a developer to improve my PageSpeed score?',
                                        'answer'   => 'Some wins — like compressing images or enabling caching via a plugin — are doable without code. Deeper fixes like code-splitting or critical CSS usually need a developer.',
                                    ],
                                ],
                            ],
                        ],

                        // ── Button Block ───────────────────────────────────────
                        [
                            'type' => 'buttonBlock',
                            'data' => [
                                'label' => 'Request a Free Performance Audit',
                                'url'   => '/contact',
                                'style' => 'primary',
                            ],
                        ],

                        // ── CTA Block ──────────────────────────────────────────
                        [
                            'type' => 'ctaBlock',
                            'data' => [
                                'eyebrow'     => 'Ready to move faster?',
                                'heading'     => 'Get a 90+ PageSpeed Score — Guaranteed',
                                'text'        => 'We audit, fix, and monitor your site performance so you never lose a visitor to slow load times again.',
                                'buttonLabel' => 'Start Today',
                                'buttonUrl'   => '/contact',
                            ],
                        ],

                        // ── Service Cards ──────────────────────────────────────
                        [
                            'type' => 'serviceCardsBlock',
                            'data' => [
                                'title' => 'Our Performance Services',
                                'cards' => [
                                    [
                                        'title' => 'Speed Audit',
                                        'text'  => 'Full Lighthouse + RUM analysis with a prioritised fix list delivered within 48 hours.',
                                        'url'   => '/services/speed-audit',
                                    ],
                                    [
                                        'title' => 'Core Web Vitals Fix',
                                        'text'  => 'Hands-on remediation of LCP, FID, and CLS issues — we do the work, you see the results.',
                                        'url'   => '/services/core-web-vitals',
                                    ],
                                    [
                                        'title' => 'Ongoing Monitoring',
                                        'text'  => 'Monthly PageSpeed reports and alerts so regressions are caught before they hurt rankings.',
                                        'url'   => '/services/monitoring',
                                    ],
                                ],
                            ],
                        ],

                        // ── Pricing Block ──────────────────────────────────────
                        [
                            'type' => 'pricingBlock',
                            'data' => [
                                'title'    => 'Performance Plans',
                                'subtitle' => 'Choose the level of support that fits your team.',
                                'plans'    => [
                                    [
                                        'name'        => 'Starter',
                                        'price'       => '$299',
                                        'description' => 'One-time audit + quick-win fixes.',
                                        'features'    => ['Lighthouse audit', 'Image optimisation', 'Caching setup', 'Written report'],
                                    ],
                                    [
                                        'name'        => 'Growth',
                                        'price'       => '$699 / mo',
                                        'description' => 'Ongoing optimisation and monitoring.',
                                        'features'    => ['Everything in Starter', 'Monthly RUM report', 'Core Web Vitals fixes', 'Priority support'],
                                    ],
                                    [
                                        'name'        => 'Enterprise',
                                        'price'       => 'Custom',
                                        'description' => 'Multi-site or high-traffic applications.',
                                        'features'    => ['Everything in Growth', 'Dedicated engineer', 'SLA guarantee', 'Quarterly strategy call'],
                                    ],
                                ],
                            ],
                        ],

                    ],
                ],
            ]
        );

        $this->command->info('Sample blog post seeded → /blog/block-design-preview');
    }
}
