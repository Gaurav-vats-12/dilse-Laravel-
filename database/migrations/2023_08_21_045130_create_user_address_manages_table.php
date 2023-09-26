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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->nullable()->default(Null);
            $table->string('billing_full_name', 255)->nullable();
            $table->string('billing_company', 255)->nullable();
            $table->string('billing_phone', 20)->nullable();
            $table->string('billing_email', 255)->nullable();
            $table->string('billing_address1', 255)->nullable();
            $table->string('billing_address2', 255)->nullable();
            $table->foreignId('countryId')->constrained()->on('countries')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('statesid')->constrained()->on('states')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('pincode', 15)->nullable();
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
