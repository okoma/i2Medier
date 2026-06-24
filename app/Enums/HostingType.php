<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum HostingType: string implements HasLabel
{
    case Cpanel     = 'cpanel';
    case Cloud      = 'cloud';
    case WordPress  = 'wordpress';
    case Vps        = 'vps';
    case Reseller   = 'reseller';
    case Dedicated  = 'dedicated';
    case I2Hosting  = 'i2_hosting';

    public function getLabel(): string
    {
        return match ($this) {
            self::Cpanel    => 'cPanel Hosting',
            self::Cloud     => 'Cloud Hosting',
            self::WordPress => 'WordPress Hosting',
            self::Vps       => 'VPS Hosting',
            self::Reseller  => 'Reseller Hosting',
            self::Dedicated => 'Dedicated Server',
            self::I2Hosting => 'i2 Hosting (Hetzner)',
        };
    }
}
