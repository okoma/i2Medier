<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class BusinessNameGenerator extends Component
{
    public string $keyword = '';
    public string $industry = 'general';
    public array $names = [];
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    protected array $rules = ['keyword' => 'required|string|max:50'];

    private array $suffixes = [
        'Hub', 'Labs', 'Pro', 'HQ', 'Co', 'Group', 'Digital', 'Media',
        'Works', 'Agency', 'Studio', 'Solutions', 'Global', 'Connect',
        'Africa', 'Ng', 'Plus', 'Edge', '360', 'Partners',
    ];

    private array $prefixes = [
        'Smart', 'Prime', 'Swift', 'Bold', 'Peak', 'Apex', 'Nova', 'Nexus', 'Elite', 'Pure',
    ];

    private array $industryTerms = [
        'tech'        => ['Tech', 'Soft', 'Dev', 'Byte'],
        'finance'     => ['Fin', 'Pay', 'Vest', 'Cap'],
        'health'      => ['Health', 'Med', 'Care', 'Life'],
        'food'        => ['Food', 'Kitchen', 'Fresh', 'Eats'],
        'fashion'     => ['Style', 'Wear', 'Fashion', 'Look'],
        'real-estate' => ['Homes', 'Realty', 'Property', 'Estates'],
        'logistics'   => ['Haul', 'Move', 'Fleet', 'Express'],
        'education'   => ['Learn', 'Academy', 'Edu', 'School'],
        'media'       => ['Media', 'Press', 'Cast', 'Broadcast'],
        'retail'      => ['Store', 'Shop', 'Mart', 'Market'],
        'consulting'  => ['Consult', 'Advisory', 'Strategy', 'Partners'],
        'agriculture' => ['Agro', 'Farm', 'Harvest', 'Crop'],
        'beauty'      => ['Beauty', 'Glow', 'Luxe', 'Radiant'],
        'sports'      => ['Sport', 'Fit', 'Active', 'Performance'],
        'general'     => ['Group', 'Corp', 'Global', 'Hub'],
    ];

    public function generate(): void
    {
        $this->validate();
        $this->emailSubmitted = false;

        $base = ucfirst(strtolower(trim($this->keyword)));
        $terms = $this->industryTerms[$this->industry] ?? $this->industryTerms['general'];

        $generated = [];
        foreach ($this->suffixes as $suffix) { $generated[] = $base . $suffix; }
        foreach ($this->prefixes as $prefix) { $generated[] = $prefix . $base; }
        foreach ($terms as $term) {
            $generated[] = $base . $term;
            $generated[] = $term . $base;
        }

        $generated = array_values(array_unique($generated));
        shuffle($generated);
        $this->names = array_slice($generated, 0, 28);
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'business-name-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.business-name-generator');
    }
}
