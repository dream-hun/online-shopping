<?php

declare(strict_types=1);

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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('house_number')->nullable()->after('shipping_address');
            $table->unsignedBigInteger('customer_id')->nullable()->after('house_number');
            $table->foreign('customer_id', 'customer_fk_orders')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('customer_fk_orders');
            $table->dropColumn(['house_number', 'customer_id']);
        });
    }
};
