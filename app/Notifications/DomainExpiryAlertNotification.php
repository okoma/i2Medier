<?php

namespace App\Notifications;

use App\Enums\ManagementType;
use App\Models\Domain;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DomainExpiryAlertNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Domain $domain,
        protected int $daysRemaining,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject("Domain {$this->domain->domain_name} expires in {$this->daysRemaining} days")
            ->greeting('Hello ' . ($notifiable->name ?? 'there') . ',')
            ->line("Your domain **{$this->domain->domain_name}** is expiring in **{$this->daysRemaining} day(s)**.");

        if ($this->domain->management_type === ManagementType::I2Managed) {
            $message->line('As your managed services partner, we will handle the renewal on your behalf. No action is required from you.');
        } else {
            $expiryDate = $this->domain->whois_expires_at?->format('d M Y')
                ?? $this->domain->expires_at?->format('d M Y')
                ?? 'the expiry date';

            $registrar = $this->domain->registrar ?? $this->domain->whois_registrar ?? 'your registrar';

            $message->line("This domain is under your management. Please renew it with **{$registrar}** before **{$expiryDate}** to avoid service disruption.");
        }

        return $message->line('Contact us if you need any assistance.');
    }
}
