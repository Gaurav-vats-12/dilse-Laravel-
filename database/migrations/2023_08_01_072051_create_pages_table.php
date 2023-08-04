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
            $table->uuid('pagesuuid');
            $table->string('page_title');
            $table->string('page_slug');
            $table->longText('page_content');
            $table->string('page_meta_title')->nullable();
            $table->longText('page_meta_description')->nullable();
            $table->enum('status',['none','active','inactive'])->default('none');
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
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
