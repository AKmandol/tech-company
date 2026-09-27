<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('job_type');
            $table->string('location')->nullable();
            $table->string('workplace_type')->default('onsite');

            $table->unsignedInteger('vacancy_count')->default(1);

            $table->date('deadline')->nullable();

            $table->unsignedTinyInteger('experience_min')->nullable();
            $table->unsignedTinyInteger('experience_max')->nullable();

            $table->decimal('salary_min', 12, 2)->nullable();
            $table->decimal('salary_max', 12, 2)->nullable();
            $table->string('salary_currency', 3)->default('BDT');

            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->string('status')->default('draft');

            $table->timestamps();

            $table->index(['status', 'deadline']);
            $table->index(['job_type', 'status']);
            $table->index(['workplace_type', 'status']);
            $table->index(['is_featured', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
