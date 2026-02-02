<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_stories', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // Our Story, Rituals
            $table->string('heading');
            $table->text('text');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_reversed')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_stories');
    }
};
