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
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->on('menus')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name',200);
            $table->string('slug',200);
            $table->text('description');
            $table->string('image',200);
            $table->float('price', 8, 2);
            $table->boolean('status')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('extra_items')->default(false);
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_items');
    }
};
