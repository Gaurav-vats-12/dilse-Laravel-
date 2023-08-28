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
            $table->string('payment_id', 255);
            $table->jsonb('paymnet_json')->nullable();
            $table->foreignId('order_id')->constrained()->on('orders')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('payment_amount', 10, 2);
            $table->string('payment_method', 255);
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
