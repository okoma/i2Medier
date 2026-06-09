<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectSubmittedClientNotification extends Notification
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
            ->subject('We received your project enquiry — ' . $this->project->reference)
            ->greeting('Hello ' . $this->clientName . ',')
            ->line('Thank you for reaching out to i2Medier. We have received your project enquiry and will review it within 24 hours.')
            ->line('Your reference number is **' . $this->project->reference . '**. Please keep it handy for any follow-up correspondence.');

        if ($services->isNotEmpty()) {
            $message->line('**Services you selected:**');

            foreach ($services as $service) {
                $label = $service['service_name'];
                if (!empty($service['variant_name'])) {
                    $label .= ' — ' . $service['variant_name'];
                }
                $addonCount = count($service['addons'] ?? []);
                if ($addonCount > 0) {
                    $label .= ' (+ ' . $addonCount . ' add-on' . ($addonCount > 1 ? 's' : '') . ')';
                }
                $message->line('• ' . $label);
            }
        }

        return $message
            ->line('We will be in touch with a tailored proposal shortly. If you have any urgent questions, simply reply to this email.');
    }
}
