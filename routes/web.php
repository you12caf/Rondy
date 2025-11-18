<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\BookingSettingsController;
use App\Http\Controllers\PublicBookingController; // <-- تم التصحيح هنا

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية للزوار
Route::get('/', function () {
    return view('welcome');
});

// المسار الرئيسي للوحة التحكم
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

// -- مجموعة مسارات الطبيب الإضافية --
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/settings', [BookingSettingsController::class, 'show'])->name('doctor.settings.show');
    Route::post('/doctor/settings', [BookingSettingsController::class, 'store'])->name('doctor.settings.store');
});

// -- المسار العام للحجز --
// -- المسارات العامة للحجز --
Route::get('/booking/{doctor}', [PublicBookingController::class, 'show'])->name('public.booking');
Route::post('/booking/{doctor}', [PublicBookingController::class, 'store'])->name('public.booking.store'); // <-- أضف هذا السطر

// هذا الملف يحتوي على كل مسارات التسجيل والدخول والخروج
require __DIR__.'/auth.php';