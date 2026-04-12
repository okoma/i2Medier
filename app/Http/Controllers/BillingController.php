<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Notifications\InvoicePaymentLinkNotification;
use App\Support\PaystackGateway;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BillingController extends Controller
{
    public function resendPaymentLink(Request $request, Invoice $invoice): RedirectResponse
    {
        abort_unless($request->user()?->isAgencyStaff(), 403);

        $invoice->ensurePublicToken();

        $recipient = $invoice->client->owner;

        if ($recipient) {
            $recipient->notify(new InvoicePaymentLinkNotification($invoice));
        } elseif (filled($invoice->client->email)) {
            Notification::route('mail', $invoice->client->email)
                ->notify(new InvoicePaymentLinkNotification($invoice));
        }

        return back()->with('success', 'Payment link sent to the client.');
    }

    public function paystackRedirect(Request $request, Invoice $invoice, PaystackGateway $gateway): RedirectResponse
    {
        abort_unless($request->user()?->client_id === $invoice->client_id, 403);
        abort_unless($invoice->canBePaidOnline(), 404);

        $redirectUrl = $gateway->initializeInvoicePayment($invoice, $request->user()?->email);

        return redirect()->away($redirectUrl);
    }

    public function paystackCallback(Request $request, Invoice $invoice, PaystackGateway $gateway): RedirectResponse
    {
        abort_unless($request->user()?->client_id === $invoice->client_id, 403);
        abort_unless($invoice->payment_method === Invoice::PAYMENT_METHOD_PAYSTACK, 404);

        $reference = (string) $request->query('reference', '');

        if ($reference === '') {
            return redirect($this->invoiceUrl($invoice))
                ->with('danger', 'Payment verification reference was missing.');
        }

        $payment = $gateway->verifyTransaction($reference);

        if (($payment['status'] ?? null) !== 'success') {
            return redirect($this->invoiceUrl($invoice))
                ->with('danger', 'Paystack did not confirm this payment yet.');
        }

        $invoice->forceFill([
            'status' => 'paid',
            'paid_at' => now(),
            'payment_method' => Invoice::PAYMENT_METHOD_PAYSTACK,
            'payment_reference' => $reference,
        ])->save();

        return redirect($this->invoiceUrl($invoice))
            ->with('success', 'Invoice payment confirmed successfully.');
    }

    protected function invoiceUrl(Invoice $invoice): string
    {
        return route('filament.client.resources.invoices.view', ['record' => $invoice]);
    }
}
