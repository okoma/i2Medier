<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectConvertedClientNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Project $project,
        protected string $clientName,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $services = collect($this->project->services ?? []);

        $message = (new MailMessage)
            ->subject('Great news — your project has been approved! (' . $this->project->reference . ')')
            ->greeting('Hello ' . $this->clientName . ',')
            ->line('We are delighted to confirm that your project **' . $this->project->reference . '** has been approved and we are ready to get started.')
            ->line('Our team will be in touch shortly to confirm the start date and walk you through the next steps.');

        if ($services->isNotEmpty()) {
            $message->line('**Approved services:**');

            foreach ($services as $service) {
                $label = $service['service_name'];
                if (!empty($service['variant_name'])) {
                    $label .= ' — ' . $service['variant_name'];
                }
                $message->line('• ' . $label);
            }
        }

        return $message
            ->line('If you have any questions in the meantime, simply reply to this email and we will get back to you promptly.')
            ->line('Thank you for choosing i2Medier — we look forward to working with you!');
    }
}
