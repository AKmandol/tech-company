<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'company_name',
                'value' => 'Tech Company',
                'type' => 'string',
                'group' => 'general',
            ],
            [
                'key' => 'company_email',
                'value' => 'hello@techcompany.test',
                'type' => 'string',
                'group' => 'contact',
            ],
            [
                'key' => 'company_phone',
                'value' => '+880 1700 000000',
                'type' => 'string',
                'group' => 'contact',
            ],
            [
                'key' => 'company_address',
                'value' => 'Dhaka, Bangladesh',
                'type' => 'string',
                'group' => 'contact',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'github_url',
                'value' => 'https://github.com',
                'type' => 'url',
                'group' => 'social',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                    'group' => $setting['group'],
                    'status' => 'active',
                ]
            );
        }
    }
}
