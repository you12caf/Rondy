<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\BookingSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية للزوار
Route::get('/', function () {
    return view('welcome');
});

// -- مجموعة مسارات الأطباء المحمية --
// لا يمكن لأحد الوصول إلى هذه المسارات إلا بعد تسجيل الدخول
Route::middleware(['auth'])->group(function () {
    
    // هذا هو المسار الذي يحل كل المشاكل.
    // نعطي القائمة العلوية المسار الذي تبحث عنه `dashboard`
    // ونجعله يشير إلى المتحكم الصحيح الخاص بنا.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // مسار الإعدادات
    Route::get('/doctor/settings', [BookingSettingsController::class, 'show'])->name('doctor.settings.show');
    Route::post('/doctor/settings', [BookingSettingsController::class, 'store'])->name('doctor.settings.store');

});

// هذا الملف يحتوي على كل مسارات التسجيل والدخول والخروج
require __DIR__.'/auth.php';