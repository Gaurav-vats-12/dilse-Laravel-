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
        Schema::create('extra_food_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_item_id')->constrained()->on('food_items')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('extra_item_id')->constrained()->on('extra_items')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_food_items');
    }
};
