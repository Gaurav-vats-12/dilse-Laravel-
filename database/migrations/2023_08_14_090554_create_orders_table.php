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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->datetime('order_date');
            $table->string('full_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('email_address', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('shipping_address', 255);
            $table->string('billing_address', 255);
            $table->decimal('total_amount', 10, 2);
            $table->enum('order_type', ['take_out','delivery', 'dinein'])->nullable();
            $table->decimal('shipping_charge', 10, 2)->nullable();
            $table->enum('status', ['Pending','Processing', 'Shipped', 'Delivered','Cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
