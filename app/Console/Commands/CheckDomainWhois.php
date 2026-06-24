<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\WhoisService;
use Illuminate\Console\Command;

class CheckDomainWhois extends Command
{
    protected $signature = 'domains:check-whois';

    protected $description = 'Run WHOIS lookups for all domains and send expiry alerts';

    public function handle(WhoisService $whois): int
    {
        $domains = Domain::needsWhoisCheck()->get();

        $this->info("Checking {$domains->count()} domain(s)…");

        foreach ($domains as $domain) {
            try {
                $whois->check($domain);
                $whois->sendExpiryAlerts($domain->fresh());
                $this->line("  ✓ {$domain->domain_name}");
            } catch (\Throwable $e) {
                $this->warn("  ✗ {$domain->domain_name}: {$e->getMessage()}");
            }
        }

        $this->info('Done.');

        return self::SUCCESS;
    }
}
