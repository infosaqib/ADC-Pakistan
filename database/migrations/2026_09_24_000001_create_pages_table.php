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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['service', 'blog'])->index();
            $table->string('title', 500);
            $table->string('slug')->index();
            $table->string('subtitle')->nullable();
            $table->longText('content');
            $table->text('excerpt')->nullable();
            $table->string('city', 100)->nullable()->index();
            $table->string('province', 100)->nullable()->index();
            $table->json('phone_numbers')->nullable();
            $table->string('meta_title', 500)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('canonical_url', 500)->nullable();
            $table->json('schema_markup')->nullable();
            $table->enum('status', ['published', 'draft', 'archived'])->default('published')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->index('updated_at');
            $table->unique(['type', 'slug'], 'pages_type_slug_unique');
            $table->unique(['type', 'title'], 'pages_service_title_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
