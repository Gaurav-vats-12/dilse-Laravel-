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
        if (!Schema::hasTable('coupons')) {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('vendor_id')->constrained()->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('parant_coupon_id')->constrained()->on('coupons')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('user_email')->nullable();
            $table->string('code')->unique();
            $table->text('coupan_description')->nullable();
            $table->enum('type', ['percentage','fixed_cart']);
            $table->double('amount', 12, 2);
            $table->double('minimum_spend', 12, 2)->nullable();
            $table->double('maximum_spend', 12, 2)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer("use_limit")->nullable();
            $table->integer("same_ip_limit")->nullable();
            $table->integer("use_limit_per_user")->nullable();
            $table->string("use_device")->nullable();
            $table->enum("multiple_use", ["yes", "no"])->default("no");
            $table->enum('coupon_type', ['referral','offer']);
            $table->integer("total_use")->default(0);
            $table->integer("status")->default(0);
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
