<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingSetting; // <-- استيراد نموذج قاعدة البيانات

class BookingSettingsController extends Controller
{
    public function show()
    {
        return view('doctor.settings');
    }

    // الدالة الجديدة لحفظ البيانات
    public function store(Request $request)
    {
        // 1. التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'work_start_time' => 'required',
            'work_end_time' => 'required',
            'is_booking_enabled' => 'required|boolean',
        ]);

        // 2. حفظ البيانات في قاعدة البيانات
        // ملاحظة: بما أننا لم ننشئ نظام تسجيل دخول بعد،
        // سنفترض مؤقتاً أننا نعدّل إعدادات الطبيب رقم 1
        $userId = 1; // <<-- هذا الرقم مؤقت

        BookingSetting::updateOrCreate(
            ['user_id' => $userId], // ابحث عن إعدادات لهذا الطبيب
            $validatedData           // وقم بتحديثها بهذه البيانات الجديدة
        );

        // 3. إعادة المستخدم إلى نفس الصفحة مع رسالة نجاح
        return redirect()->back()->with('success', 'تم حفظ الإعدادات بنجاح!');
    }
}