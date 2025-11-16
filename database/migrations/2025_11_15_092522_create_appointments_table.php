<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // لربط الموعد بالطبيب
        $table->string('patient_name'); // اسم الزبون/المريض
        $table->string('patient_phone'); // رقم هاتف الزبون
        $table->date('appointment_date'); // تاريخ الحجز (لليوم الحالي)
        $table->integer('ticket_number'); // رقم الدور أو التذكرة
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
        Schema::dropIfExists('appointments');
    }
}
