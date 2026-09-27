<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'short_description' => 'A scalable e-commerce platform.',
                'description' => 'A complete e-commerce platform with product management, order processing, payment integration and analytics.',
                'client_name' => 'ABC Corporation',
                'project_url' => 'https://example.com',
                'github_url' => null,
                'category' => 'Web Application',
                'display_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'CRM Platform',
                'slug' => 'crm-platform',
                'short_description' => 'Business CRM and customer management system.',
                'description' => 'A CRM platform designed to manage customers, sales activities, reports and business workflows.',
                'client_name' => 'XYZ Limited',
                'project_url' => 'https://example.com',
                'github_url' => null,
                'category' => 'SaaS',
                'display_order' => 2,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                array_merge($project, [
                    'status' => 'published',
                ])
            );
        }
    }
}
