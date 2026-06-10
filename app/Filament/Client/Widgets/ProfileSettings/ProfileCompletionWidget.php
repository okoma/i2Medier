<?php

namespace App\Filament\Client\Widgets\ProfileSettings;

use Filament\Widgets\Widget;

class ProfileCompletionWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.profile-completion';

    public int $percentage = 0;

    public array $items = [];

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user    = auth()->user();
        $client  = $user->client;

        $this->items = [
            ['label' => 'Name',            'done' => filled($user->name)],
            ['label' => 'Email',           'done' => filled($user->email)],
            ['label' => 'Phone',           'done' => filled($user->phone)],
            ['label' => 'Profile Photo',   'done' => filled($user->avatar)],
            ['label' => 'Company Name',    'done' => filled($client?->company_name)],
            ['label' => 'Company Email',   'done' => filled($client?->email)],
            ['label' => 'Address',         'done' => filled($client?->address)],
            ['label' => 'Country',         'done' => filled($client?->country)],
        ];

        $done            = collect($this->items)->where('done', true)->count();
        $this->percentage = (int) round(($done / count($this->items)) * 100);
    }
}
