<?php

namespace App\Notifications;

use App\Models\SupportTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SupportTicketSubmittedNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected SupportTicket $ticket,
        protected string $departmentLabel,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New contact ticket: ' . $this->ticket->ticket_number)
            ->greeting('Hello ' . $this->departmentLabel . ' team,')
            ->line('A new public contact form message has been submitted and saved as a support ticket.')
            ->line('Ticket: ' . $this->ticket->ticket_number)
            ->line('Name: ' . ($this->ticket->requester_name ?? 'Unknown'))
            ->line('Email: ' . ($this->ticket->requester_email ?? 'Unknown'))
            ->line('Phone: ' . ($this->ticket->requester_phone ?? 'Not provided'))
            ->line('Company: ' . ($this->ticket->requester_company ?? 'Not provided'))
            ->line('Subject: ' . $this->ticket->subject)
            ->line('Message:')
            ->line($this->ticket->description)
            ->line('Source: public contact form');
    }
}
