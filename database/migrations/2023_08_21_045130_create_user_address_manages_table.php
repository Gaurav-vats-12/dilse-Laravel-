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
        Schema::create('user_address_manages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('billing_address1', 255);
            $table->string('billing_address2', 255);
            $table->foreignId('countryId')->constrained()->on('countries')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('statesid')->constrained()->on('states')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('city', 255);
            $table->string('pincode', 15);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address_manages');
    }
};
