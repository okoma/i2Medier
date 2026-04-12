<?php

namespace App\Notifications;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaymentLinkNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Invoice $invoice,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Payment link for invoice ' . $this->invoice->invoice_number)
            ->greeting('Hello ' . ($notifiable->name ?? 'there') . ',')
            ->line('Your invoice is ready for payment.')
            ->line('Invoice number: ' . $this->invoice->invoice_number)
            ->line('Amount due: ' . $this->invoice->currency . ' ' . number_format((float) $this->invoice->total, 2))
            ->action('View invoice', $this->invoice->publicPaymentUrl())
            ->line('If you prefer bank transfer, the invoice page includes the transfer details as well.');
    }
}
