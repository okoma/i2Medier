<?php

namespace App\Support;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class PaystackGateway
{
    public function __construct(
        protected PaymentSettings $settings,
    ) {}

    protected function secretKey(): string
    {
        $key = $this->settings->paystackSecretKey();

        if ($key === '') {
            throw new RuntimeException('Paystack secret key is not configured.');
        }

        return $key;
    }

    public function initializeInvoicePayment(Invoice $invoice, ?string $customerEmail): string
    {
        if (! $this->settings->paystackEnabled()) {
            throw new RuntimeException('Paystack payments are currently disabled.');
        }

        if (blank($customerEmail)) {
            throw new RuntimeException('A client email is required before starting a Paystack payment.');
        }

        $reference = $this->referenceFor($invoice);

        $response = Http::acceptJson()
            ->withToken($this->secretKey())
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $customerEmail,
                'amount' => (int) round(((float) $invoice->total) * 100),
                'currency' => $invoice->currency ?? 'NGN',
                'reference' => $reference,
                'callback_url' => route('public.invoices.paystack.callback', ['token' => $invoice->ensurePublicToken()]),
                'metadata' => [
                    'invoice_id' => $invoice->getKey(),
                    'invoice_number' => $invoice->invoice_number,
                    'client_id' => $invoice->client_id,
                ],
            ])
            ->throw();

        InvoicePayment::query()->create([
            'invoice_id' => $invoice->getKey(),
            'method' => Invoice::PAYMENT_METHOD_PAYSTACK,
            'provider' => 'paystack',
            'status' => 'pending',
            'amount' => $invoice->total,
            'currency' => $invoice->currency ?? 'NGN',
            'reference' => $reference,
            'initiated_at' => now(),
            'gateway_payload' => $response->json('data'),
        ]);

        $payload = $response->json();
        $authorizationUrl = data_get($payload, 'data.authorization_url');

        if (! is_string($authorizationUrl) || ($authorizationUrl === '')) {
            throw new RuntimeException('Paystack did not return an authorization URL.');
        }

        return $authorizationUrl;
    }

    public function verifyTransaction(string $reference): array
    {
        try {
            $response = Http::acceptJson()
                ->withToken($this->secretKey())
                ->get("https://api.paystack.co/transaction/verify/{$reference}")
                ->throw();
        } catch (RequestException $exception) {
            throw new RuntimeException('Unable to verify the Paystack transaction.', previous: $exception);
        }

        return $response->json('data', []);
    }

    protected function referenceFor(Invoice $invoice): string
    {
        return sprintf('invoice_%s_%s', $invoice->getKey(), now()->timestamp);
    }
}
