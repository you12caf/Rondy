<?php

namespace App\Http\Controllers\Doctor; // <-- تم التصحيح

use App\Http\Controllers\Controller; // <-- تم التصحيح
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingSetting; // <-- تم التصحيح

class BookingSettingsController extends Controller
{
    /**
     * عرض صفحة الإعدادات مع البيانات الحالية.
     */
    public function show()
    {
        // ابحث عن إعدادات الطبيب المسجل حاليًا
        // إذا لم يجد إعدادات، سيعيد null، وهذا مقبول
        $settings = BookingSetting::where('user_id', Auth::id())->first();

        // قم بإرسال هذه الإعدادات (أو null) إلى الواجهة
        return view('doctor.settings', compact('settings'));
    }

    /**
     * حفظ الإعدادات.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'work_start_time' => 'required',
            'work_end_time' => 'required',
            'is_booking_enabled' => 'required|boolean',
        ]);

        $userId = Auth::id();

        BookingSetting::updateOrCreate(
            ['user_id' => $userId],
            $validatedData
        );

        return redirect()->back()->with('success', 'Settings saved successfully!');
    }
}