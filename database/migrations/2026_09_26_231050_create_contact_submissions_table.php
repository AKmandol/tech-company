<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();

            $table->string('company_name')->nullable();

            $table->string('subject')->nullable();

            $table->text('message')->nullable();

            $table->string('request_type')->default('contact');

            $table->foreignId('service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            $table->text('admin_notes')->nullable();

            $table->timestamp('replied_at')->nullable();

            $table->string('status')->default('new');

            $table->timestamps();

            $table->index(['request_type', 'status']);
            $table->index(['email']);
            $table->index(['service_id']);
            $table->index(['created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
