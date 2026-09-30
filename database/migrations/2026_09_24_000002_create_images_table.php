<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('imageable_type');
            $table->unsignedBigInteger('imageable_id');
            $table->string('path', 500);
            $table->string('disk', 50)->default('public');
            $table->string('url', 500)->nullable();
            $table->enum('role', ['featured', 'hero', 'gallery', 'inline', 'og_image'])->default('featured')->index();
            $table->string('alt_text', 500)->nullable();
            $table->string('caption', 500)->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedInteger('file_size')->nullable();
            $table->unsignedSmallInteger('width')->nullable();
            $table->unsignedSmallInteger('height')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['imageable_type', 'imageable_id'], 'images_imageable_type_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
