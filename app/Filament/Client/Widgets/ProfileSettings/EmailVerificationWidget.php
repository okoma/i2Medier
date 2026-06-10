<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class EmailVerificationWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.email-verification';

    public string $email       = '';
    public bool   $isVerified  = false;
    public string $verifiedAt  = '';

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $this->email      = $user->email;
        $this->isVerified = $user->hasVerifiedEmail();
        $this->verifiedAt = $user->email_verified_at?->format('M d, Y') ?? '';
    }

    public function resend(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            Notification::make()->title('Email already verified')->info()->send();
            return;
        }

        $user->sendEmailVerificationNotification();

        Notification::make()->title('Verification email sent')->success()->send();
    }
}
