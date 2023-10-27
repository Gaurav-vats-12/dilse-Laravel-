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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('coupon_code',200);
            $table->text('coupan_description')->nullable();
            $table->enum('discount_type', ['percent','fixed_cart']);
            $table->decimal('coupon_amount', 10, 2);
            $table->decimal('minimum_amount', 10, 2);
            $table->decimal('maximum_amount', 10, 2);
            $table->enum('coupon_type', ['referral','offer']);
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['active','inactive']);
            $table->string('Coupan_usage',200)->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
