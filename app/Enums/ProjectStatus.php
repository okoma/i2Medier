<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: string implements HasColor, HasLabel
{
    case Enquiry = 'enquiry';
    case ProposalSent = 'proposal_sent';
    case Negotiating = 'negotiating';
    case Converted = 'converted';
    case Declined = 'declined';

    public function getLabel(): string
    {
        return match ($this) {
            self::Enquiry => 'Enquiry',
            self::ProposalSent => 'Proposal Sent',
            self::Negotiating => 'Negotiating',
            self::Converted => 'Converted',
            self::Declined => 'Declined',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Enquiry => 'warning',
            self::ProposalSent => 'info',
            self::Negotiating => 'primary',
            self::Converted => 'success',
            self::Declined => 'danger',
        };
    }

    public function canBeConverted(): bool
    {
        return match ($this) {
            self::Enquiry, self::ProposalSent, self::Negotiating => true,
            default => false,
        };
    }

    public function canBeDeclined(): bool
    {
        return $this !== self::Converted && $this !== self::Declined;
    }
}
