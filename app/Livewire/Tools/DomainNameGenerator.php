<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class DomainNameGenerator extends Component
{
    public string $keyword = '';
    public string $industry = 'general';
    public array $domains = [];
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    protected array $rules = ['keyword' => 'required|string|max:50'];

    private array $suffixes = [
        'Hub', 'Labs', 'Pro', 'HQ', 'Co', 'Group', 'Digital', 'Media',
        'Works', 'Agency', 'Studio', 'Solutions', 'Global', 'Connect',
        'Africa', 'Plus', 'Edge', '360',
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

    private array $tlds = ['.com', '.ng', '.co', '.io', '.africa', '.com.ng'];

    public function generate(): void
    {
        $this->validate();
        $this->emailSubmitted = false;

        $base = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', trim($this->keyword)));
        $terms = $this->industryTerms[$this->industry] ?? $this->industryTerms['general'];

        $names = [];
        foreach ($this->suffixes as $suffix) { $names[] = $base . strtolower($suffix); }
        foreach ($this->prefixes as $prefix) { $names[] = strtolower($prefix) . $base; }
        foreach ($terms as $term) {
            $names[] = $base . strtolower($term);
            $names[] = strtolower($term) . $base;
        }

        $names = array_values(array_unique($names));
        shuffle($names);
        $names = array_slice($names, 0, 10);

        $domains = [];
        foreach ($names as $name) {
            foreach ($this->tlds as $tld) {
                $domains[] = [
                    'domain'    => $name . $tld,
                    'long'      => strlen($name) > 15,
                    'check_url' => 'https://domainr.com/?q=' . urlencode($name . $tld),
                ];
            }
        }

        $this->domains = $domains;
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'domain-name-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.domain-name-generator');
    }
}
