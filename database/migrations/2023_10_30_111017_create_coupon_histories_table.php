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
        if (!Schema::hasTable('coupon_histories')) {
            Schema::create('coupon_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('user_email')->unique()->nullable();
            $table->foreignId('coupon_id')->constrained()->on('coupons')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('order_id')->constrained()->on('orders')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->double('discount_amount', 12, 2);
            $table->string("user_ip")->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_histories');
    }
};
