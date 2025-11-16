<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('booking_settings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // لربط الإعدادات بالطبيب
        $table->time('work_start_time')->nullable(); // وقت بدء الحجز
        $table->time('work_end_time')->nullable(); // وقت انتهاء الحجز
        $table->boolean('is_booking_enabled')->default(false); // هل الحجز مفتوح أم مغلق؟
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_settings');
    }
}
