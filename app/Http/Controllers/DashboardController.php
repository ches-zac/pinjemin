<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function goToAdminDashboard() {
        return view('admin.dashboard');
    }

    public function goToUserDashboard() {
        return view('dashboard');
    }
}
