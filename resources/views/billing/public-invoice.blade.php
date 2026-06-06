<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php(
        $decodeSeoValue = static fn ($value) => is_string($value)
            ? html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8')
            : $value
    )
    <title>{{ $decodeSeoValue($seo['title'] ?? '') }}</title>
    <meta name="description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
    <meta name="robots" content="{{ $decodeSeoValue($seo['robots'] ?? '') }}">
    <link rel="canonical" href="{{ $seo['url'] ?? url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['url'] ?? url()->current() }}">
    <meta property="og:title" content="{{ $decodeSeoValue($seo['title'] ?? '') }}">
    <meta property="og:description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
    <meta property="og:site_name" content="i2Medier">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $decodeSeoValue($seo['title'] ?? '') }}">
    <meta name="twitter:description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
    <script type="application/ld+json">{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Invoice',
        'name' => $decodeSeoValue($seo['title'] ?? ''),
        'description' => $decodeSeoValue($seo['description'] ?? ''),
        'url' => $seo['url'] ?? url()->current(),
        'identifier' => $invoice->invoice_number,
        'provider' => [
            '@type' => 'Organization',
            'name' => 'i2Medier',
            'url' => url('/'),
        ],
        'totalPaymentDue' => [
            '@type' => 'MonetaryAmount',
            'currency' => $invoice->currency,
            'value' => number_format((float) $invoice->total, 2, '.', ''),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4ede2] text-stone-900">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(14,165,233,0.12),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(245,158,11,0.18),_transparent_26%),linear-gradient(180deg,_#f4ede2_0%,_#fbf8f2_100%)]">
        <div class="mx-auto max-w-6xl px-6 py-10">
            <div class="mb-8 rounded-[2rem] border border-stone-900/10 bg-stone-950 px-8 py-10 text-white shadow-2xl shadow-stone-900/10">
                <p class="text-xs uppercase tracking-[0.35em] text-cyan-300">i2Medier Invoice</p>
                <div class="mt-4 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <h1 class="text-4xl font-semibold">{{ $invoice->invoice_number }}</h1>
                        <p class="mt-3 max-w-2xl text-sm leading-7 text-stone-300">A secure invoice payment page for managed website services. Pay online with Paystack or use the bank transfer details below.</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-stone-400">Amount Due</p>
                        <p class="mt-2 text-3xl font-semibold">{{ $invoice->currency }} {{ number_format((float) $invoice->total, 2) }}</p>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">{{ session('success') }}</div>
            @endif

            @if (session('danger'))
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-rose-800">{{ session('danger') }}</div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                <section class="rounded-[2rem] border border-stone-900/10 bg-white/85 p-8 shadow-xl shadow-stone-900/5">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-cyan-800">Client</p>
                            <p class="mt-3 text-lg font-semibold text-stone-950">{{ $invoice->client->company_name }}</p>
                            <p class="mt-2 text-sm text-stone-600">{{ $invoice->client->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-cyan-800">Status</p>
                            <p class="mt-3 text-lg font-semibold text-stone-950">{{ ucfirst($invoice->status) }}</p>
                            <p class="mt-2 text-sm text-stone-600">Due {{ optional($invoice->due_at)->format('M d, Y') ?? 'Not set' }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <p class="text-xs uppercase tracking-[0.3em] text-orange-700">Invoice Items</p>
                        <div class="mt-4 overflow-hidden rounded-2xl border border-stone-200">
                            <table class="min-w-full divide-y divide-stone-200 text-sm">
                                <thead class="bg-stone-50 text-left text-stone-600">
                                    <tr>
                                        <th class="px-4 py-3 font-medium">Description</th>
                                        <th class="px-4 py-3 font-medium">Qty</th>
                                        <th class="px-4 py-3 font-medium">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-stone-100 bg-white">
                                    @forelse ($invoice->items as $item)
                                        <tr>
                                            <td class="px-4 py-3 text-stone-800">{{ $item->description }}</td>
                                            <td class="px-4 py-3 text-stone-600">{{ $item->quantity }}</td>
                                            <td class="px-4 py-3 font-medium text-stone-900">{{ $invoice->currency }} {{ number_format((float) $item->line_total, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-6 text-center text-stone-500">No invoice items added yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-3 text-sm sm:max-w-sm sm:ml-auto">
                        <div class="flex items-center justify-between"><span class="text-stone-600">Subtotal</span><span>{{ $invoice->currency }} {{ number_format((float) $invoice->subtotal, 2) }}</span></div>
                        <div class="flex items-center justify-between"><span class="text-stone-600">Tax</span><span>{{ $invoice->currency }} {{ number_format((float) $invoice->tax_amount, 2) }}</span></div>
                        <div class="flex items-center justify-between"><span class="text-stone-600">Discount</span><span>{{ $invoice->currency }} {{ number_format((float) $invoice->discount_amount, 2) }}</span></div>
                        <div class="flex items-center justify-between border-t border-stone-200 pt-3 text-base font-semibold"><span>Total</span><span>{{ $invoice->currency }} {{ number_format((float) $invoice->total, 2) }}</span></div>
                    </div>
                </section>

                <aside class="space-y-6">
                    <section class="rounded-[2rem] border border-stone-900/10 bg-white/85 p-8 shadow-xl shadow-stone-900/5">
                        <p class="text-xs uppercase tracking-[0.3em] text-cyan-800">Pay Online</p>
                        <h2 class="mt-3 text-2xl font-semibold text-stone-950">Pay with Paystack</h2>
                        <p class="mt-3 text-sm leading-7 text-stone-600">Fast online payment for this invoice using Paystack.</p>
                        <a href="{{ route('public.invoices.paystack.redirect', ['token' => $invoice->public_token]) }}" class="mt-6 inline-flex rounded-full bg-stone-950 px-5 py-3 text-sm font-medium text-white {{ ! ($invoice->canBePaidOnline() && $settings->paystackEnabled()) ? 'pointer-events-none opacity-50' : '' }}">
                            Continue to Paystack
                        </a>
                    </section>

                    <section class="rounded-[2rem] border border-stone-900/10 bg-[#fff9ef] p-8 shadow-xl shadow-amber-950/5">
                        <p class="text-xs uppercase tracking-[0.3em] text-orange-700">Bank Transfer</p>
                        <h2 class="mt-3 text-2xl font-semibold text-stone-950">Manual payment details</h2>
                        <div class="mt-5 space-y-2 text-sm text-stone-700">
                            <p><strong>Bank:</strong> {{ $bankTransfer['bank_name'] ?: 'Not configured yet' }}</p>
                            <p><strong>Account name:</strong> {{ $bankTransfer['account_name'] ?: 'Not configured yet' }}</p>
                            <p><strong>Account number:</strong> {{ $bankTransfer['account_number'] ?: 'Not configured yet' }}</p>
                            @if (filled($bankTransfer['sort_code']))
                                <p><strong>Sort code:</strong> {{ $bankTransfer['sort_code'] }}</p>
                            @endif
                            <p><strong>Reference:</strong> {{ $invoice->invoice_number }}</p>
                        </div>
                        <p class="mt-4 text-sm leading-7 text-stone-600">{{ $bankTransfer['instructions'] }}</p>
                    </section>

                    <section class="rounded-[2rem] border border-stone-900/10 bg-white/85 p-8 shadow-xl shadow-stone-900/5">
                        <p class="text-xs uppercase tracking-[0.3em] text-cyan-800">Payment History</p>
                        <div class="mt-4 space-y-3">
                            @forelse ($invoice->payments as $payment)
                                <div class="rounded-2xl border border-stone-200 px-4 py-3">
                                    <div class="flex items-center justify-between gap-4">
                                        <p class="font-medium text-stone-900">{{ ucfirst(str_replace('_', ' ', $payment->method)) }}</p>
                                        <span class="text-xs uppercase tracking-[0.2em] text-stone-500">{{ $payment->status }}</span>
                                    </div>
                                    <p class="mt-2 text-sm text-stone-600">{{ $payment->currency }} {{ number_format((float) $payment->amount, 2) }}</p>
                                    <p class="mt-1 text-xs text-stone-500">{{ $payment->reference }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-stone-500">No payments recorded for this invoice yet.</p>
                            @endforelse
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</body>
</html>
