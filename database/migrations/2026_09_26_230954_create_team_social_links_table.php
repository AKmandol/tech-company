<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_social_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('team_member_id')
                ->constrained('team_members')
                ->cascadeOnDelete();

            $table->string('platform');
            $table->string('url');

            $table->unsignedInteger('display_order')->default(0);

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index(['team_member_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_social_links');
    }
};
