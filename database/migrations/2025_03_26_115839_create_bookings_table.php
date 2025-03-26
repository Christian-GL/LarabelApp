<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('_id');
            $table->string('photo', 255);
            $table->string('full_name_guest', 50);
            $table->timestamp('order_date');
            $table->timestamp('check_in_date');
            $table->timestamp('check_out_date');
            $table->string('special_request', 250);
            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('_id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
