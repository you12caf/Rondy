<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- سنحتاجه

class DashboardController extends Controller
{
    /**
     * عرض لوحة تحكم الطبيب.
     */
    public function index()
    {
        // ببساطة، قم بعرض هذه الواجهة
        return view('doctor.dashboard');
    }
}