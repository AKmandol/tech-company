<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_sub_categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_category_id')
                ->constrained('blog_categories')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug');

            $table->text('description')->nullable();

            $table->unsignedInteger('display_order')->default(0);

            $table->string('status')->default('active');

            $table->timestamps();

            $table->unique(['blog_category_id', 'slug']);

            $table->index(['blog_category_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_sub_categories');
    }
};
