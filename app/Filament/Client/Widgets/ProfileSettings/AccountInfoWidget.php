<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use Filament\Widgets\Widget;

class AccountInfoWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.account-info';

    public string $accountId   = '';
    public string $role        = '';
    public string $lastLogin   = '';
    public bool   $loginAlerts = false;

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $this->accountId   = 'CUST-' . str_pad((string) $user->id, 5, '0', STR_PAD_LEFT);
        $this->role        = $user->isClientOwner() ? 'Owner' : 'Member';
        $this->lastLogin   = $user->last_login_at?->format('M d, Y · g:i A') ?? 'Never';
        $this->loginAlerts = (bool) ($user->notification_preferences['login_alerts'] ?? true);
    }
}
