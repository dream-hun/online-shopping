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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_one')->unique();
            $table->string('mobile_two')->unique();
            $table->string('whatsapp')->unique();
            $table->string('email_one');
            $table->string('email_two');
            $table->integer('shipping_fee');
            $table->string('address');
            $table->longText('about_us');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
