<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_requirements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('career_id')
                ->constrained('careers')
                ->cascadeOnDelete();

            $table->text('requirement');

            $table->unsignedInteger('display_order')->default(0);

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index(['career_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_requirements');
    }
};
