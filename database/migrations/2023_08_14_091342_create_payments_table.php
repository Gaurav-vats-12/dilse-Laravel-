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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('paymnet_id', 255);
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('order_id')->constrained()->on('orders')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->enum('payment_method', ['pay_on_delivery','pay_on_store', 'payonline']);
            $table->enum('payment_status', ['pending','paid', 'failed']);
            $table->datetime('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
