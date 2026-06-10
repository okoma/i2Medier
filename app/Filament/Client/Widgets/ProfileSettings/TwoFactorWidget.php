<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use Filament\Widgets\Widget;

class TwoFactorWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.two-factor';
}
