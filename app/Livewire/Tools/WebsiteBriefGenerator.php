<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class WebsiteBriefGenerator extends Component
{
    public int $step = 1;

    // Step 1
    public string $businessName = '';
    public string $industry = '';
    public string $targetAudience = '';
    public string $location = '';

    // Step 2
    public string $primaryGoal = 'generate leads';
    public array $pages = [];
    public string $designStyle = 'clean & minimal';

    // Step 3
    public string $budget = 'Under ₦200k';
    public string $timeline = 'ASAP';
    public string $additionalNotes = '';

    // Gate
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    private function stepRules(): array
    {
        return match ($this->step) {
            1 => [
                'businessName'   => 'required|string|max:100',
                'industry'       => 'required|string',
                'targetAudience' => 'required|string|max:200',
                'location'       => 'required|string|max:100',
            ],
            2 => [
                'primaryGoal' => 'required|string',
                'pages'       => 'array',
                'designStyle' => 'required|string',
            ],
            default => [
                'budget'   => 'required|string',
                'timeline' => 'required|string',
            ],
        };
    }

    public function nextStep(): void
    {
        $this->validate($this->stepRules());
        $this->step++;
    }

    public function prevStep(): void
    {
        $this->step = max(1, $this->step - 1);
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'website-brief-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.website-brief-generator');
    }
}
