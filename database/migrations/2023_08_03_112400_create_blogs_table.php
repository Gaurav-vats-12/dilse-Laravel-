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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title');
            $table->string('slug')->nullable();
            $table->text('blog_short_content');
            $table->text('blog_content');
            $table->string('blog_meta_title');
            $table->text('blog_meta_description');
            $table->string('blog_image');
            $table->string('author')->nullable();
            $table->enum('status',['none','published','inactive','draft'])->default('draft');
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
