<?php

namespace App\Notifications;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectSubmittedTeamNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Project $project,
        protected Client $client,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $services = collect($this->project->services ?? []);

        $message = (new MailMessage)
            ->subject('New enquiry: ' . $this->project->reference . ' — ' . $this->client->company_name)
            ->greeting('New project enquiry received.')
            ->line('**Reference:** ' . $this->project->reference)
            ->line('**Client:** ' . $this->client->contact_name . ' (' . $this->client->company_name . ')')
            ->line('**Email:** ' . $this->client->email)
            ->line('**Phone:** ' . ($this->client->phone ?? 'Not provided'))
            ->line('**Country:** ' . ($this->client->country ?? 'Not provided'));

        if (filled($this->project->timeline)) {
            $message->line('**Timeline:** ' . $this->project->timeline);
        }

        if (filled($this->project->budget)) {
            $message->line('**Budget:** ' . $this->project->budget);
        }

        if ($services->isNotEmpty()) {
            $message->line('**Services requested:**');

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

        if (filled($this->project->message)) {
            $message->line('**Client message:**')->line($this->project->message);
        }

        return $message;
    }
}
