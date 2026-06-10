<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ActiveSessionsWidget extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.client.widgets.active-sessions';

    public Collection $sessions;

    public string $currentSessionId = '';

    public function mount(): void
    {
        $this->currentSessionId = Session::getId();
        $this->loadSessions();
    }

    public function loadSessions(): void
    {
        $this->sessions = DB::table('sessions')
            ->where('user_id', auth()->id())
            ->orderByDesc('last_activity')
            ->get()
            ->map(function (object $s): array {
                $agent   = $s->user_agent ?? '';
                $browser = $this->parseBrowser($agent);
                $os      = $this->parseOs($agent);

                return [
                    'id'          => $s->id,
                    'ip'          => $s->ip_address ?? '—',
                    'browser'     => $browser,
                    'os'          => $os,
                    'last_active' => \Carbon\Carbon::createFromTimestamp($s->last_activity)->diffForHumans(),
                    'is_current'  => $s->id === $this->currentSessionId,
                ];
            });
    }

    public function revoke(string $sessionId): void
    {
        if ($sessionId === $this->currentSessionId) {
            Notification::make()->title('Cannot revoke your current session')->warning()->send();
            return;
        }

        DB::table('sessions')->where('id', $sessionId)->where('user_id', auth()->id())->delete();

        $this->loadSessions();

        Notification::make()->title('Session revoked')->success()->send();
    }

    public function revokeAll(): void
    {
        DB::table('sessions')
            ->where('user_id', auth()->id())
            ->where('id', '!=', $this->currentSessionId)
            ->delete();

        $this->loadSessions();

        Notification::make()->title('All other sessions revoked')->success()->send();
    }

    private function parseBrowser(string $agent): string
    {
        return match (true) {
            str_contains($agent, 'Edg/')   => 'Edge',
            str_contains($agent, 'Chrome') => 'Chrome',
            str_contains($agent, 'Firefox')=> 'Firefox',
            str_contains($agent, 'Safari') => 'Safari',
            str_contains($agent, 'Opera')  => 'Opera',
            default                        => 'Unknown browser',
        };
    }

    private function parseOs(string $agent): string
    {
        return match (true) {
            str_contains($agent, 'Windows') => 'Windows',
            str_contains($agent, 'Mac OS')  => 'macOS',
            str_contains($agent, 'iPhone')  => 'iPhone',
            str_contains($agent, 'Android') => 'Android',
            str_contains($agent, 'Linux')   => 'Linux',
            default                         => 'Unknown OS',
        };
    }
}
