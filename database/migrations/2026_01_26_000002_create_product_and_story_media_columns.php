<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create Product Images table for gallery
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Add video_path to video_stories table for self-hosted videos
        Schema::table('video_stories', function (Blueprint $table) {
            $table->string('video_path')->nullable()->after('video_url');
        });
    }

    public function down(): void
    {
        Schema::table('video_stories', function (Blueprint $table) {
            $table->dropColumn('video_path');
        });
        Schema::dropIfExists('product_images');
    }
};
