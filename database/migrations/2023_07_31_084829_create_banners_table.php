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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->uuid('banneruuid');
            $table->string('banner_title');
            $table->string('banner_heading');
            $table->string('bannerImage')->nullable();
            $table->longText('banner_discription');
            $table->enum('banner_type',['none','home','popup','promo','sales'])->default('none');
            $table->enum('status',['none','active','inactive'])->default('none');
            $table->string('banner_details1')->nullable();
            $table->string('banner_details2')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
