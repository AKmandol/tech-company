<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_category_id')
                ->constrained('blog_categories')
                ->restrictOnDelete();

            $table->foreignId('blog_sub_category_id')
                ->nullable()
                ->constrained('blog_sub_categories')
                ->nullOnDelete();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();
            $table->longText('content');

            $table->timestamp('published_at')->nullable();

            $table->unsignedSmallInteger('reading_time')->nullable();
            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_recommended')->default(false);
            $table->boolean('is_latest')->default(false);
            $table->boolean('is_featured')->default(false);

            $table->string('status')->default('draft');

            $table->timestamps();

            $table->index(['status', 'published_at']);
            $table->index(['blog_category_id', 'status']);
            $table->index(['blog_sub_category_id', 'status']);
            $table->index(['is_recommended', 'status']);
            $table->index(['is_latest', 'status']);
            $table->index(['is_featured', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
