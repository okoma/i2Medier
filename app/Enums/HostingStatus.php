<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum HostingStatus: string implements HasColor, HasLabel
{
    case Active        = 'active';
    case ExpiringSoon  = 'expiring_soon';
    case Suspended     = 'suspended';
    case Cancelled     = 'cancelled';
    case Pending       = 'pending';

    public function getLabel(): string
    {
        return match ($this) {
            self::Active       => 'Active',
            self::ExpiringSoon => 'Expiring Soon',
            self::Suspended    => 'Suspended',
            self::Cancelled    => 'Cancelled',
            self::Pending      => 'Pending',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Active       => 'success',
            self::ExpiringSoon => 'warning',
            self::Suspended    => 'danger',
            self::Cancelled    => 'gray',
            self::Pending      => 'info',
        };
    }
}
