<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;

class DashboardController extends Controller
{
    public function goToAdminDashboard() {
        $lendings = Lending::orderBy('created_at', 'desc')->take(10)->get();
        $title  = 'Admin Dashboard';
        return view('admin.dashborad', compact('lendings', 'title'));
    }

    public function goToUserDashboard() {

        $lendings = Lending::orderBy('created_at', 'desc')->take(10)->get();
        $title  = 'Dashboard';
        return view('dashboard', compact('lendings', 'title'));
    }

    public function faq(){
        return view('faq');
    }
}
