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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('address')->nullable();
            $table->string('site_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website_url')->nullable();
            $table->string('site_currency')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('opening_hour')->nullable();
            $table->string('footer_logo')->nullable();
            $table->text('footer_image_2')->nullable();
            $table->text('site_location')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('blogto_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
