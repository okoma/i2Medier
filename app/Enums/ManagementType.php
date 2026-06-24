<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ManagementType: string implements HasColor, HasLabel
{
    case I2Managed   = 'i2_managed';
    case SelfManaged = 'self_managed';

    public function getLabel(): string
    {
        return match ($this) {
            self::I2Managed   => 'Agency Managed',
            self::SelfManaged => 'Self Managed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::I2Managed   => 'primary',
            self::SelfManaged => 'gray',
        };
    }

    public function isBillable(): bool
    {
        return $this === self::I2Managed;
    }
}
