<?php

namespace App\Http\Controllers\Doctor; // <-- تم التصحيح

use Carbon\Carbon;
use App\Models\Appointment; // <-- تم التصحيح
use Illuminate\Support\Facades\Auth; // <-- تم التصحيح
use App\Http\Controllers\Controller; // <-- تم التصحيح
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. احصل على هوية الطبيب المسجل حاليًا
        $doctorId = Auth::id();
        
        // 2. احصل على تاريخ اليوم
        $today = Carbon::today('Africa/Algiers');

        // 3. ابحث في قاعدة البيانات عن كل المواعيد الخاصة بهذا الطبيب
        //    والتي تم حجزها في تاريخ اليوم فقط
        //    وقم بترتيبها حسب رقم الدور (من الأصغر للأكبر)
        $appointments = Appointment::where('user_id', $doctorId)
                                   ->whereDate('appointment_date', $today)
                                   ->orderBy('ticket_number', 'asc')
                                   ->get();

        // 4. أرسل هذه المواعيد إلى الواجهة
        return view('doctor.dashboard', compact('appointments'));
    }
}