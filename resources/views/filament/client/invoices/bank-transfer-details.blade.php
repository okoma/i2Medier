<div class="space-y-4 text-sm text-stone-700">
    <div class="rounded-2xl border border-stone-200 bg-stone-50 p-4">
        <p><strong>Bank:</strong> {{ $bankTransfer['bank_name'] ?: 'Not configured yet' }}</p>
        <p><strong>Account name:</strong> {{ $bankTransfer['account_name'] ?: 'Not configured yet' }}</p>
        <p><strong>Account number:</strong> {{ $bankTransfer['account_number'] ?: 'Not configured yet' }}</p>
        @if (filled($bankTransfer['sort_code']))
            <p><strong>Sort code:</strong> {{ $bankTransfer['sort_code'] }}</p>
        @endif
    </div>

    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4">
        <p><strong>Transfer reference:</strong> {{ $invoice->invoice_number }}</p>
        <p class="mt-2">{{ $bankTransfer['instructions'] }}</p>
    </div>
</div>
