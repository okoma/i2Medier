<?php

namespace App\Services;

use App\Enums\DomainStatus;
use App\Enums\ManagementType;
use App\Models\Domain;
use Iodev\Whois\Factory as WhoisFactory;
use Throwable;

class WhoisService
{
    public function check(Domain $domain): void
    {
        try {
            $whois = WhoisFactory::get()->createWhois();
            $info  = $whois->loadDomainInfo($domain->domain_name);

            if ($info) {
                $this->updateFromWhoisResult($domain, $info);
            } else {
                $domain->update(['whois_last_checked_at' => now()]);
            }
        } catch (Throwable) {
            // Silent failure — one bad domain must not stop the daily batch
        }
    }

    private function updateFromWhoisResult(Domain $domain, object $info): void
    {
        $newExpiry = $info->expirationDate ? \Carbon\Carbon::parse($info->expirationDate) : null;

        // Detect renewal: new expiry moved from near-expiry to well beyond 60 days
        if (
            $newExpiry &&
            $domain->whois_expires_at &&
            $newExpiry->diffInDays(now(), false) < -60 &&
            ($domain->whois_expires_at->diffInDays(now(), false) >= -30)
        ) {
            $domain->resetAlertFlags();
        }

        $states = $info->states ?? [];

        $domain->update([
            'whois_expires_at'     => $newExpiry?->toDateString(),
            'whois_registrar'      => $info->registrar ?? null,
            'whois_status_raw'     => implode(', ', $states),
            'whois_last_checked_at' => now(),
            'whois_raw'            => json_encode([
                'expiration' => $info->expirationDate,
                'created'    => $info->creationDate,
                'registrar'  => $info->registrar,
                'states'     => $states,
            ]),
        ]);

        $this->syncStatusFromWhois($domain->fresh());
    }

    private function syncStatusFromWhois(Domain $domain): void
    {
        $raw = strtolower((string) $domain->whois_status_raw);

        $suspendKeywords = ['clienthold', 'serverhold', 'redemptionperiod', 'pendingdelete'];

        $newStatus = null;

        foreach ($suspendKeywords as $keyword) {
            if (str_contains($raw, $keyword)) {
                $newStatus = DomainStatus::Suspended;
                break;
            }
        }

        if (! $newStatus) {
            $expiresAt = $domain->whois_expires_at ?? $domain->expires_at;

            if ($expiresAt && $expiresAt->isPast()) {
                $newStatus = DomainStatus::Expired;
            } elseif ($expiresAt && $expiresAt->diffInDays(now(), false) >= -30) {
                $newStatus = DomainStatus::ExpiringSoon;
            } else {
                $newStatus = DomainStatus::Active;
            }
        }

        if ($domain->status !== $newStatus) {
            $domain->update(['status' => $newStatus]);
        }
    }

    public function sendExpiryAlerts(Domain $domain): void
    {
        $client = $domain->client;

        if (! $client) {
            return;
        }

        foreach ([30, 14, 7] as $days) {
            if (! $domain->shouldSendAlert($days)) {
                continue;
            }

            $client->users()
                ->where(function ($q) {
                    $q->whereNull('notification_preferences->email')
                        ->orWhere('notification_preferences->email', true);
                })
                ->each(function ($user) use ($domain, $days) {
                    $user->notify(new \App\Notifications\DomainExpiryAlertNotification($domain, $days));
                });

            $domain->markAlertSent($days);
        }
    }
}
