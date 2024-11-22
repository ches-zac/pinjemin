<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function goToAdminDashboard() {
        return view('admin.dashborad');
    }

    public function goToUserDashboard() {
        return view('dashboard');
    }

    public function faq(){
        return view('faq');
    }
}
