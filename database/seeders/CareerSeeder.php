<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Senior Laravel Developer',
                'slug' => 'senior-laravel-developer',
                'short_description' => 'We are looking for an experienced Laravel developer.',
                'description' => 'Join our engineering team and work on scalable web applications and APIs.',
                'job_type' => 'full_time',
                'location' => 'Dhaka, Bangladesh',
                'workplace_type' => 'hybrid',
                'vacancy_count' => 2,
                'deadline' => now()->addDays(30)->toDateString(),
                'experience_min' => 3,
                'experience_max' => 6,
                'salary_min' => 60000,
                'salary_max' => 100000,
                'salary_currency' => 'BDT',
                'display_order' => 1,
                'is_featured' => true,

                'skills' => [
                    'PHP',
                    'Laravel',
                    'MySQL',
                    'REST API',
                    'Git',
                ],

                'responsibilities' => [
                    'Develop and maintain Laravel applications.',
                    'Design and implement REST APIs.',
                    'Optimize database queries and application performance.',
                    'Participate in code reviews.',
                    'Work with frontend developers and product teams.',
                ],

                'requirements' => [
                    '3+ years of professional Laravel experience.',
                    'Strong understanding of PHP and object-oriented programming.',
                    'Experience with MySQL.',
                    'Experience building REST APIs.',
                    'Good understanding of Git and software development workflows.',
                ],
            ],

            [
                'title' => 'Frontend React Developer',
                'slug' => 'frontend-react-developer',
                'short_description' => 'We are looking for a React developer.',
                'description' => 'Work with our product team to create modern and responsive user interfaces.',
                'job_type' => 'full_time',
                'location' => 'Dhaka, Bangladesh',
                'workplace_type' => 'remote',
                'vacancy_count' => 1,
                'deadline' => now()->addDays(45)->toDateString(),
                'experience_min' => 1,
                'experience_max' => 4,
                'salary_min' => 40000,
                'salary_max' => 80000,
                'salary_currency' => 'BDT',
                'display_order' => 2,
                'is_featured' => false,

                'skills' => [
                    'JavaScript',
                    'React.js',
                    'HTML',
                    'CSS',
                    'REST API',
                ],

                'responsibilities' => [
                    'Build reusable React components.',
                    'Integrate frontend applications with REST APIs.',
                    'Create responsive user interfaces.',
                    'Optimize frontend performance.',
                ],

                'requirements' => [
                    'Experience with React.js.',
                    'Good JavaScript knowledge.',
                    'Understanding of REST APIs.',
                    'Knowledge of Git.',
                ],
            ],
        ];

        foreach ($careers as $careerData) {
            $skills = $careerData['skills'];
            $responsibilities = $careerData['responsibilities'];
            $requirements = $careerData['requirements'];

            unset(
                $careerData['skills'],
                $careerData['responsibilities'],
                $careerData['requirements']
            );

            $career = Career::updateOrCreate(
                ['slug' => $careerData['slug']],
                array_merge($careerData, [
                    'status' => 'published',
                ])
            );

            foreach ($skills as $index => $skill) {
                $career->skills()->updateOrCreate(
                    ['skill' => $skill],
                    [
                        'display_order' => $index + 1,
                        'status' => 'active',
                    ]
                );
            }

            foreach ($responsibilities as $index => $responsibility) {
                $career->responsibilities()->updateOrCreate(
                    ['responsibility' => $responsibility],
                    [
                        'display_order' => $index + 1,
                        'status' => 'active',
                    ]
                );
            }

            foreach ($requirements as $index => $requirement) {
                $career->requirements()->updateOrCreate(
                    ['requirement' => $requirement],
                    [
                        'display_order' => $index + 1,
                        'status' => 'active',
                    ]
                );
            }
        }
    }
}
