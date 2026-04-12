<?php

namespace App\Support;

use App\Models\Addon;
use App\Models\OnboardingTask;
use App\Models\Service;
use App\Models\ServiceSubscription;
use App\Models\Website;
use App\Models\WebsitePackageItem;

class PackageProvisioner
{
    public static function provision(Website $website): void
    {
        $website->loadMissing('package.items.itemable');

        if (! $website->package) {
            return;
        }

        $serviceSubscriptions = [];

        foreach ($website->package->items as $item) {
            if ($item->itemable instanceof Service) {
                $subscription = ServiceSubscription::query()->firstOrCreate(
                    [
                        'website_id' => $website->id,
                        'service_id' => $item->itemable->id,
                        'client_id' => $website->client_id,
                    ],
                    [
                        'status' => 'active',
                        'billing_type' => $item->itemable->billing_type,
                        'billing_cycle' => $item->itemable->billing_cycle,
                        'price' => $item->itemable->price,
                        'currency' => $item->itemable->currency,
                        'starts_at' => now()->toDateString(),
                        'expires_at' => self::calculateExpiryDate($item->itemable->billing_cycle),
                        'auto_renew' => false,
                        'created_by' => auth()->id() ?? $website->created_by,
                        'notes' => 'Provisioned from package: ' . $website->package->name,
                    ],
                );

                $serviceSubscriptions[$item->itemable->id] = $subscription;
                self::createOnboardingTask($website, $item, 'service');
            }
        }

        foreach ($website->package->items as $item) {
            if ($item->itemable instanceof Addon) {
                $parentSubscription = $serviceSubscriptions[$item->itemable->service_id] ?? null;

                if ($parentSubscription) {
                    $parentSubscription->addonSubscriptions()->firstOrCreate(
                        [
                            'addon_id' => $item->itemable->id,
                            'client_id' => $website->client_id,
                        ],
                        [
                            'status' => 'active',
                            'price' => $item->itemable->price,
                            'currency' => $item->itemable->currency,
                            'billing_type' => $item->itemable->billing_type,
                            'billing_cycle' => $item->itemable->billing_cycle,
                            'starts_at' => now()->toDateString(),
                            'expires_at' => self::calculateExpiryDate($item->itemable->billing_cycle),
                            'auto_renew' => false,
                        ],
                    );
                }

                self::createOnboardingTask($website, $item, 'addon');
            }
        }
    }

    protected static function calculateExpiryDate(?string $billingCycle): ?string
    {
        return match ($billingCycle) {
            'monthly' => now()->addMonth()->toDateString(),
            'quarterly' => now()->addMonths(3)->toDateString(),
            'biannual' => now()->addMonths(6)->toDateString(),
            'yearly' => now()->addYear()->toDateString(),
            default => null,
        };
    }

    protected static function createOnboardingTask(Website $website, WebsitePackageItem $item, string $kind): void
    {
        $name = $item->itemable?->name ?? 'Package item';

        OnboardingTask::query()->firstOrCreate(
            [
                'website_id' => $website->id,
                'title' => 'Provision ' . $name,
            ],
            [
                'description' => 'Provisioned automatically from package "' . $website->package->name . '".',
                'type' => $kind === 'service' ? 'cms_install' : 'content_upload',
                'status' => 'pending',
                'sort_order' => 0,
            ],
        );
    }
}
