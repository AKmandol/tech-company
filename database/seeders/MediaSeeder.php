<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Client;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::where('slug', 'web-development')->first();
        $project = Project::where('slug', 'e-commerce-platform')->first();
        $teamMember = TeamMember::where('slug', 'john-doe')->first();
        $client = Client::where('company_name', 'ABC Corporation')->first();

        if ($service) {
            Media::updateOrCreate(
                [
                    'mediable_type' => Service::class,
                    'mediable_id' => $service->id,
                    'collection' => 'service_image',
                ],
                [
                    'name' => 'Web Development Service',
                    'file_name' => 'web-development.jpg',
                    'file_path' => 'media/services/web-development.jpg',
                    'disk' => 'public',
                    'mime_type' => 'image/jpeg',
                    'size' => 150000,
                    'alt_text' => 'Web Development',
                    'display_order' => 1,
                    'status' => 'active',
                ]
            );

            Media::updateOrCreate(
                [
                    'mediable_type' => Service::class,
                    'mediable_id' => $service->id,
                    'collection' => 'service_icon',
                ],
                [
                    'name' => 'Web Development Icon',
                    'file_name' => 'web-development-icon.svg',
                    'file_path' => 'media/services/web-development-icon.svg',
                    'disk' => 'public',
                    'mime_type' => 'image/svg+xml',
                    'size' => 5000,
                    'alt_text' => 'Web Development Icon',
                    'display_order' => 1,
                    'status' => 'active',
                ]
            );
        }

        if ($project) {
            foreach ([
                'project-thumbnail.jpg',
                'project-gallery-1.jpg',
                'project-gallery-2.jpg',
                'project-gallery-3.jpg',
            ] as $index => $fileName) {
                $collection = $index === 0
                    ? 'project_thumbnail'
                    : 'project_gallery';

                Media::updateOrCreate(
                    [
                        'mediable_type' => Project::class,
                        'mediable_id' => $project->id,
                        'file_name' => $fileName,
                    ],
                    [
                        'name' => 'E-Commerce Project Image',
                        'file_path' => "media/projects/{$fileName}",
                        'disk' => 'public',
                        'mime_type' => 'image/jpeg',
                        'size' => 180000,
                        'collection' => $collection,
                        'alt_text' => 'E-Commerce Platform',
                        'display_order' => $index + 1,
                        'status' => 'active',
                    ]
                );
            }
        }

        if ($teamMember) {
            Media::updateOrCreate(
                [
                    'mediable_type' => TeamMember::class,
                    'mediable_id' => $teamMember->id,
                    'collection' => 'team_image',
                ],
                [
                    'name' => 'John Doe Profile',
                    'file_name' => 'john-doe.jpg',
                    'file_path' => 'media/team/john-doe.jpg',
                    'disk' => 'public',
                    'mime_type' => 'image/jpeg',
                    'size' => 120000,
                    'alt_text' => 'John Doe',
                    'display_order' => 1,
                    'status' => 'active',
                ]
            );
        }

        if ($client) {
            Media::updateOrCreate(
                [
                    'mediable_type' => Client::class,
                    'mediable_id' => $client->id,
                    'collection' => 'client_logo',
                ],
                [
                    'name' => 'ABC Corporation Logo',
                    'file_name' => 'abc-corporation.png',
                    'file_path' => 'media/clients/abc-corporation.png',
                    'disk' => 'public',
                    'mime_type' => 'image/png',
                    'size' => 60000,
                    'alt_text' => 'ABC Corporation',
                    'display_order' => 1,
                    'status' => 'active',
                ]
            );
        }
    }
}
