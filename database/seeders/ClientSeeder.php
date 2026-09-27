<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'company_name' => 'ABC Corporation',
                'project_name' => 'E-Commerce Platform',
                'description' => 'Complete e-commerce solution for online retail operations.',
                'website_url' => 'https://example.com',
                'display_order' => 1,
                'is_featured' => true,
            ],
            [
                'company_name' => 'XYZ Limited',
                'project_name' => 'CRM Platform',
                'description' => 'Customer relationship management platform.',
                'website_url' => 'https://example.com',
                'display_order' => 2,
                'is_featured' => true,
            ],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(
                [
                    'company_name' => $client['company_name'],
                    'project_name' => $client['project_name'],
                ],
                array_merge($client, [
                    'status' => 'published',
                ])
            );
        }
    }
}
