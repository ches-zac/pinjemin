<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;

class DashboardController extends Controller
{
    public function goToAdminDashboard() {
        $lendings = Lending::orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.dashborad', compact('lendings'));
    }

    public function goToUserDashboard() {

        return view('dashboard');
    }

    public function faq(){
        return view('faq');
    }
}
