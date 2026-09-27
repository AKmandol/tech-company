<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'short_description' => 'Modern and scalable web applications.',
                'description' => 'We build scalable, secure and high-performance web applications tailored to business requirements.',
                'display_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'short_description' => 'Mobile applications for modern businesses.',
                'description' => 'We develop reliable mobile applications focused on performance, usability and business growth.',
                'display_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'short_description' => 'User-focused digital product design.',
                'description' => 'We design intuitive digital experiences that help users interact with products efficiently.',
                'display_order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'short_description' => 'Reliable deployment and infrastructure solutions.',
                'description' => 'We help businesses automate deployments and build reliable cloud infrastructure.',
                'display_order' => 4,
                'is_featured' => false,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                array_merge($service, [
                    'status' => 'published',
                ])
            );
        }
    }
}
