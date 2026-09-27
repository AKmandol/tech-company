<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $technology = BlogCategory::updateOrCreate(
            ['slug' => 'technology'],
            [
                'name' => 'Technology',
                'description' => 'Technology and software development articles.',
                'display_order' => 1,
                'status' => 'active',
            ]
        );

        $business = BlogCategory::updateOrCreate(
            ['slug' => 'business'],
            [
                'name' => 'Business',
                'description' => 'Business and digital transformation insights.',
                'display_order' => 2,
                'status' => 'active',
            ]
        );

        $webDevelopment = $technology->subCategories()->updateOrCreate(
            ['slug' => 'web-development'],
            [
                'name' => 'Web Development',
                'description' => 'Web development articles.',
                'display_order' => 1,
                'status' => 'active',
            ]
        );

        $artificialIntelligence = $technology->subCategories()->updateOrCreate(
            ['slug' => 'artificial-intelligence'],
            [
                'name' => 'Artificial Intelligence',
                'description' => 'AI and machine learning articles.',
                'display_order' => 2,
                'status' => 'active',
            ]
        );

        $digitalTransformation = $business->subCategories()->updateOrCreate(
            ['slug' => 'digital-transformation'],
            [
                'name' => 'Digital Transformation',
                'description' => 'Digital transformation insights.',
                'display_order' => 1,
                'status' => 'active',
            ]
        );

        $laravelTag = BlogTag::updateOrCreate(
            ['slug' => 'laravel'],
            [
                'name' => 'Laravel',
                'status' => 'active',
            ]
        );

        $reactTag = BlogTag::updateOrCreate(
            ['slug' => 'react'],
            [
                'name' => 'React',
                'status' => 'active',
            ]
        );

        $aiTag = BlogTag::updateOrCreate(
            ['slug' => 'artificial-intelligence'],
            [
                'name' => 'Artificial Intelligence',
                'status' => 'active',
            ]
        );

        $post = BlogPost::updateOrCreate(
            ['slug' => 'building-modern-web-applications'],
            [
                'blog_category_id' => $technology->id,
                'blog_sub_category_id' => $webDevelopment->id,
                'author_id' => 1,

                'title' => 'Building Modern Web Applications',
                'excerpt' => 'An overview of modern web application architecture.',
                'content' => '<p>Modern web applications require scalable architecture, clean APIs and reliable infrastructure.</p>',

                'published_at' => now(),

                'reading_time' => 5,
                'views' => 0,

                'is_recommended' => true,
                'is_latest' => true,
                'is_featured' => true,

                'status' => 'published',
            ]
        );

        $post->tags()->sync([
            $laravelTag->id,
            $reactTag->id,
        ]);

        $aiPost = BlogPost::updateOrCreate(
            ['slug' => 'how-ai-is-changing-software-development'],
            [
                'blog_category_id' => $technology->id,
                'blog_sub_category_id' => $artificialIntelligence->id,
                'author_id' => 1,

                'title' => 'How AI Is Changing Software Development',
                'excerpt' => 'Understanding the impact of AI on modern software development.',
                'content' => '<p>Artificial intelligence is changing how developers design, build and maintain software applications.</p>',

                'published_at' => now()->subDays(2),

                'reading_time' => 6,
                'views' => 0,

                'is_recommended' => true,
                'is_latest' => false,
                'is_featured' => true,

                'status' => 'published',
            ]
        );

        $aiPost->tags()->sync([
            $aiTag->id,
        ]);

        BlogPost::updateOrCreate(
            ['slug' => 'digital-transformation-for-businesses'],
            [
                'blog_category_id' => $business->id,
                'blog_sub_category_id' => $digitalTransformation->id,
                'author_id' => 1,

                'title' => 'Digital Transformation for Businesses',
                'excerpt' => 'How businesses can use technology to improve their operations.',
                'content' => '<p>Digital transformation allows organizations to modernize processes and improve customer experiences.</p>',

                'published_at' => now()->subDays(5),

                'reading_time' => 7,
                'views' => 0,

                'is_recommended' => false,
                'is_latest' => false,
                'is_featured' => false,

                'status' => 'published',
            ]
        );
    }
}
