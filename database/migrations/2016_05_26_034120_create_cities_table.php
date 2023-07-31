<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('country_id')->constrained()->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->string('state_code');
            $table->string('country_code');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->boolean('flag')->default(false);
            $table->string('wikiDataId')->nullable();
            $table->softDeletes(); // <-- This will add a deleted_at field

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
