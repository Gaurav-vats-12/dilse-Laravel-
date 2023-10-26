<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('settings', function (Blueprint $table) {
        $table->decimal('minimum_order_for_delivery', 10, 2)->nullable()->default(null)->after('blogto_url');
        $table->decimal('delivery_charge_within_5km', 10, 2)->nullable()->default(null)->after('blogto_url');
        $table->decimal('delivery_charge_outside_5km', 10, 2)->nullable()->default(null)->after('blogto_url');
        $table->decimal('tax', 10, 2)->nullable()->default(null)->after('blogto_url');
        $table->decimal('referrel_points_on_signup', 10, 2)->nullable()->default(null)->after('blogto_url');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('settings', function (Blueprint $table) {
        $table->dropColumn('delivery_charge');
    });
}

};
