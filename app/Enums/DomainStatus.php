<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum DomainStatus: string implements HasColor, HasLabel
{
    case Active        = 'active';
    case ExpiringSoon  = 'expiring_soon';
    case Expired       = 'expired';
    case Transferred   = 'transferred';
    case Pending       = 'pending';

    public function getLabel(): string
    {
        return match ($this) {
            self::Active       => 'Active',
            self::ExpiringSoon => 'Expiring Soon',
            self::Expired      => 'Expired',
            self::Transferred  => 'Transferred',
            self::Pending      => 'Pending',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Active       => 'success',
            self::ExpiringSoon => 'warning',
            self::Expired      => 'danger',
            self::Transferred  => 'info',
            self::Pending      => 'gray',
        };
    }
}
