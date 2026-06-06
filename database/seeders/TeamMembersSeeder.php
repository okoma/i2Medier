<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMembersSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Chidi Emmanuel',
                'role' => 'Founder & CEO',
                'bio' => 'Started i2Medier in 2018 after building web products for 4 years as a freelancer. Leads strategy, client relationships, and Laravel architecture. Believes businesses should love their digital products, not just tolerate them.',
                'initials' => 'CE',
                'theme' => 'gold',
                'sort_order' => 1,
                'is_active' => true,
                'linkedin_url' => '#',
                'twitter_url' => '#',
                'github_url' => '#',
            ],
            [
                'name' => 'Adaeze Okonkwo',
                'role' => 'Head of Design',
                'bio' => 'Leads all UI/UX design work at i2Medier. Trained in human-centred design, Adaeze insists on research before pixels and it shows in the conversion rates her designs consistently produce for clients.',
                'initials' => 'AO',
                'theme' => 'purple',
                'sort_order' => 2,
                'is_active' => true,
                'linkedin_url' => '#',
                'dribbble_url' => '#',
            ],
            [
                'name' => 'Tunde Mathias',
                'role' => 'Lead Developer',
                'bio' => 'Full-stack engineer specialising in WordPress and Laravel. Tunde writes clean, documented, maintainable code — the kind that other developers thank you for. 6 years building production applications.',
                'initials' => 'TM',
                'theme' => 'blue',
                'sort_order' => 3,
                'is_active' => true,
                'github_url' => '#',
                'linkedin_url' => '#',
            ],
            [
                'name' => 'Fatimah Kamara',
                'role' => 'Project & Client Manager',
                'bio' => 'The person who ensures projects land on time and clients always know what is happening. Fatimah manages our project workflows, client communications, and the maintenance care plan programme.',
                'initials' => 'FK',
                'theme' => 'green',
                'sort_order' => 4,
                'is_active' => true,
                'linkedin_url' => '#',
                'twitter_url' => '#',
            ],
            [
                'name' => 'Samuel Agbor',
                'role' => 'Business Development',
                'bio' => 'Leads new business development and partnerships across Nigeria and the diaspora market. Former marketing director who crossed over to the agency side after seeing how i2Medier transformed a client\'s revenue with a single redesign.',
                'initials' => 'SA',
                'theme' => 'rose',
                'sort_order' => 5,
                'is_active' => true,
                'linkedin_url' => '#',
                'twitter_url' => '#',
            ],
            [
                'name' => 'Blessing Okafor',
                'role' => 'Front-end Engineer & SEO',
                'bio' => 'Builds pixel-perfect HTML/CSS from Figma designs and owns technical SEO across all client projects. Blessing is the reason i2Medier sites score consistently well on Core Web Vitals and Lighthouse.',
                'initials' => 'BO',
                'theme' => 'teal',
                'sort_order' => 6,
                'is_active' => true,
                'github_url' => '#',
                'linkedin_url' => '#',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::query()->updateOrCreate(
                ['name' => $member['name']],
                $member,
            );
        }

        SiteSetting::query()->updateOrCreate(
            ['id' => SiteSetting::query()->value('id') ?? 1],
            [
                'about_team_eyebrow' => 'The People',
                'about_team_heading' => 'Small team.<br>Serious craft.',
                'about_team_intro' => 'We are deliberately small. A focused team means every client gets senior attention — not a junior handed their project and told to run with it. Every person on the i2Medier team works directly on client projects.',
            ],
        );
    }
}
