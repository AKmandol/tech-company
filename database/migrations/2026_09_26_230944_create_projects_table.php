<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('client_name')->nullable();

            $table->string('project_url')->nullable();
            $table->string('github_url')->nullable();

            $table->string('category')->nullable();

            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->string('status')->default('draft');

            $table->timestamps();

            $table->index(['status', 'display_order']);
            $table->index(['category', 'status']);
            $table->index(['is_featured', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
