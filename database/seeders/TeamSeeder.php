<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'John Doe',
                'slug' => 'john-doe',
                'designation' => 'Chief Executive Officer',
                'short_bio' => 'Technology entrepreneur focused on digital transformation.',
                'description' => 'John leads the company strategy and works closely with clients to deliver digital solutions.',
                'email' => 'john@example.com',
                'display_order' => 1,
                'is_featured' => true,
                'social_links' => [
                    [
                        'platform' => 'linkedin',
                        'url' => 'https://linkedin.com',
                    ],
                    [
                        'platform' => 'github',
                        'url' => 'https://github.com',
                    ],
                ],
            ],
            [
                'name' => 'Jane Smith',
                'slug' => 'jane-smith',
                'designation' => 'Lead Software Engineer',
                'short_bio' => 'Software engineer specializing in scalable applications.',
                'description' => 'Jane works on application architecture, backend systems and engineering processes.',
                'email' => 'jane@example.com',
                'display_order' => 2,
                'is_featured' => true,
                'social_links' => [
                    [
                        'platform' => 'linkedin',
                        'url' => 'https://linkedin.com',
                    ],
                    [
                        'platform' => 'github',
                        'url' => 'https://github.com',
                    ],
                ],
            ],
        ];

        foreach ($members as $memberData) {
            $socialLinks = $memberData['social_links'];

            unset($memberData['social_links']);

            $member = TeamMember::updateOrCreate(
                ['slug' => $memberData['slug']],
                array_merge($memberData, [
                    'status' => 'published',
                ])
            );

            foreach ($socialLinks as $index => $social) {
                $member->socialLinks()->updateOrCreate(
                    [
                        'platform' => $social['platform'],
                    ],
                    [
                        'url' => $social['url'],
                        'display_order' => $index + 1,
                        'status' => 'active',
                    ]
                );
            }
        }
    }
}
