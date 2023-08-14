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
            $table->foreignId('user_id')->constrained()->on('users')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('order_date');
            $table->string('full_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('shipping_address', 255);
            $table->string('billing_address', 255);
            $table->decimal('total_amount', 10, 2);
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
