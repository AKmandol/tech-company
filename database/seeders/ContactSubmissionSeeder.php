<?php

namespace Database\Seeders;

use App\Models\ContactSubmission;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ContactSubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $service = Service::where('slug', 'web-development')->first();

        ContactSubmission::updateOrCreate(
            [
                'email' => 'john@example.com',
                'subject' => 'Website Development Inquiry',
            ],
            [
                'name' => 'John Smith',
                'phone' => '+8801700000000',
                'company_name' => 'Example Corporation',
                'message' => 'We are interested in developing a new business website.',
                'request_type' => 'contact',
                'service_id' => $service?->id,
                'admin_notes' => null,
                'replied_at' => null,
                'status' => 'new',
            ]
        );

        ContactSubmission::updateOrCreate(
            [
                'email' => 'jane@example.com',
                'subject' => 'Demo Request',
            ],
            [
                'name' => 'Jane Doe',
                'phone' => '+8801800000000',
                'company_name' => 'Demo Company',
                'message' => 'We would like to schedule a product demonstration.',
                'request_type' => 'demo_request',
                'service_id' => $service?->id,
                'admin_notes' => null,
                'replied_at' => null,
                'status' => 'new',
            ]
        );
    }
}
