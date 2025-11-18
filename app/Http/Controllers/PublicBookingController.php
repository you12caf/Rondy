<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment; // <-- استيراد نموذج المواعيد
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingSetting;

class PublicBookingController extends Controller
{
    // ... (دالة show تبقى كما هي)
    public function show(User $doctor)
    {
        $settings = BookingSetting::where('user_id', $doctor->id)->first();
        if (!$settings || !$settings->is_booking_enabled) {
            return view('booking.closed');
        }
        $now = Carbon::now('Africa/Algiers');
        $startTime = Carbon::parse($settings->work_start_time, 'Africa/Algiers');
        $endTime = Carbon::parse($settings->work_end_time, 'Africa/Algiers');
        if (!$now->between($startTime, $endTime)) {
            return view('booking.closed');
        }
        return view('booking.show', compact('doctor'));
    }

    // --- الدالة الجديدة ---
    public function store(Request $request, User $doctor)
    {
        // 1. تحقق من أن المستخدم أدخل بيانات صالحة
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
        ]);

        // 2. احسب رقم الدور
        $today = Carbon::today('Africa/Algiers');
        $appointmentsCount = Appointment::where('user_id', $doctor->id)
                                        ->whereDate('appointment_date', $today)
                                        ->count();
        $ticketNumber = $appointmentsCount + 1;

        // 3. أنشئ الموعد الجديد في قاعدة البيانات
        $appointment = Appointment::create([
            'user_id' => $doctor->id,
            'patient_name' => $validatedData['patient_name'],
            'patient_phone' => $validatedData['patient_phone'],
            'appointment_date' => $today,
            'ticket_number' => $ticketNumber,
        ]);

        // 4. اعرض صفحة النجاح مع معلومات الموعد الجديد
        return view('booking.success', compact('appointment'));
    }
}