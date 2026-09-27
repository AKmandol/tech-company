<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('disk')->default('public');

            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();

            $table->string('collection')->nullable();

            $table->nullableMorphs('mediable');

            $table->string('alt_text')->nullable();
            $table->text('caption')->nullable();

            $table->unsignedInteger('display_order')->default(0);

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index(['collection', 'status']);
            $table->index(['display_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
