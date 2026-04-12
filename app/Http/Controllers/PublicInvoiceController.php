<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Support\PaymentSettings;
use App\Support\PaystackGateway;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicInvoiceController extends Controller
{
    public function show(string $token, PaymentSettings $settings): View
    {
        $invoice = $this->findInvoice($token);

        return view('billing.public-invoice', [
            'invoice' => $invoice->load('client', 'website', 'items', 'payments'),
            'settings' => $settings,
            'bankTransfer' => $settings->bankTransferDetails(),
        ]);
    }

    public function paystackRedirect(string $token, PaystackGateway $gateway): RedirectResponse
    {
        $invoice = $this->findInvoice($token);
        abort_unless($invoice->canBePaidOnline(), 404);

        $redirectUrl = $gateway->initializeInvoicePayment($invoice, $invoice->client->email);

        return redirect()->away($redirectUrl);
    }

    public function paystackCallback(Request $request, string $token, PaystackGateway $gateway): RedirectResponse
    {
        $invoice = $this->findInvoice($token);
        abort_unless($invoice->payment_method === Invoice::PAYMENT_METHOD_PAYSTACK, 404);

        $reference = (string) $request->query('reference', '');

        if ($reference === '') {
            return redirect($invoice->publicPaymentUrl())
                ->with('danger', 'Payment verification reference was missing.');
        }

        $payment = $gateway->verifyTransaction($reference);

        InvoicePayment::query()
            ->firstOrCreate(
                ['invoice_id' => $invoice->getKey(), 'reference' => $reference],
                [
                    'method' => Invoice::PAYMENT_METHOD_PAYSTACK,
                    'provider' => 'paystack',
                    'status' => 'pending',
                    'amount' => $invoice->total,
                    'currency' => $invoice->currency,
                    'initiated_at' => now(),
                ],
            )
            ->forceFill([
                'status' => ($payment['status'] ?? null) === 'success' ? 'paid' : 'failed',
                'gateway_reference' => (string) ($payment['reference'] ?? $reference),
                'gateway_payload' => $payment,
                'paid_at' => ($payment['status'] ?? null) === 'success' ? now() : null,
            ])
            ->save();

        if (($payment['status'] ?? null) !== 'success') {
            return redirect($invoice->publicPaymentUrl())
                ->with('danger', 'Paystack did not confirm this payment yet.');
        }

        $invoice->forceFill([
            'status' => 'paid',
            'paid_at' => now(),
            'payment_method' => Invoice::PAYMENT_METHOD_PAYSTACK,
            'payment_reference' => $reference,
        ])->save();

        return redirect($invoice->publicPaymentUrl())
            ->with('success', 'Invoice payment confirmed successfully.');
    }

    protected function findInvoice(string $token): Invoice
    {
        return Invoice::query()
            ->with('client.owner')
            ->where('public_token', $token)
            ->firstOrFail();
    }
}
