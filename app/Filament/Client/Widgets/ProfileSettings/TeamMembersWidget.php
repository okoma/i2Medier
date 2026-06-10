<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeamMembersWidget extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.client.widgets.team-members';

    public Collection $members;

    public bool $showInviteForm = false;

    public string $inviteName  = '';
    public string $inviteEmail = '';

    public function mount(): void
    {
        $this->loadMembers();
    }

    public function loadMembers(): void
    {
        /** @var User $user */
        $user = auth()->user();

        $this->members = User::where('client_id', $user->client_id)
            ->where('id', '!=', $user->id)
            ->get()
            ->map(fn (User $m): array => [
                'id'         => $m->id,
                'name'       => $m->name,
                'email'      => $m->email,
                'role'       => $m->isClientOwner() ? 'Owner' : 'Member',
                'last_login' => $m->last_login_at?->diffForHumans() ?? 'Never',
                'is_active'  => $m->is_active,
            ]);
    }

    public function invite(): void
    {
        /** @var User $owner */
        $owner = auth()->user();

        abort_unless($owner->isClientOwner(), 403);

        $this->validate([
            'inviteName'  => 'required|string|max:255',
            'inviteEmail' => 'required|email|unique:users,email',
        ]);

        $tempPassword = Str::password(12);

        $member = User::create([
            'name'      => $this->inviteName,
            'email'     => $this->inviteEmail,
            'password'  => Hash::make($tempPassword),
            'client_id' => $owner->client_id,
            'is_active' => true,
        ]);

        $member->assignRole('client_member');

        $this->inviteName      = '';
        $this->inviteEmail     = '';
        $this->showInviteForm  = false;

        $this->loadMembers();

        Notification::make()
            ->title('Member added — temporary password: ' . $tempPassword)
            ->warning()
            ->persistent()
            ->send();
    }

    public function remove(int $memberId): void
    {
        /** @var User $owner */
        $owner = auth()->user();

        abort_unless($owner->isClientOwner(), 403);

        $target = User::where('id', $memberId)
            ->where('client_id', $owner->client_id)
            ->firstOrFail();

        abort_if($target->isClientOwner(), 403);

        $target->update(['client_id' => null, 'is_active' => false]);

        $this->loadMembers();

        Notification::make()->title('Member removed')->success()->send();
    }
}
