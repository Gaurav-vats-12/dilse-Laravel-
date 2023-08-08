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
            $table->unsignedBigInteger('user_id');
            $table->datetime('order_date');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed']);
            $table->enum('status', ['Pending','Processing', 'Shipped', 'Delivered','Cancelled']);
            $table->string('shipping_address', 255);
            $table->string('billing_address', 255);
            $table->string('payment_method', 50);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
