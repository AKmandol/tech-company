<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('project_name');

            $table->text('description')->nullable();

            $table->string('website_url')->nullable();

            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->string('status')->default('draft');

            $table->timestamps();

            $table->index(['status', 'display_order']);
            $table->index(['is_featured', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
