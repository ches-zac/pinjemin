<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;

class DashboardController extends Controller
{
    public function goToAdminDashboard() {
        $lendings = Lending::with(['user', 'inventory'])->orderBy('updated_at', 'desc')->paginate(5);
        $title  = 'Admin Dashboard';
        return view('admin.dashborad', compact('lendings', 'title'));
    }

    public function goToUserDashboard() {

        $lendings = Lending::with(['user', 'inventory'])->orderBy('updated_at', 'desc')->paginate(5);
        $title  = 'Dashboard';
        return view('dashboard', compact('lendings', 'title'));
    }

    public function faq() {
        $title = 'faq';
        $faqs = [
            [
                'question' => 'Apa itu website PINJEMIN?',
                'answer' => 'PINJEMIN adalah sistem manajemen inventaris sekolah yang memungkinkan pengguna untuk meminjam barang.'
            ],
            [
                'question' => 'Bagaimana cara meminjam barang?',
                'answer' => 'Anda dapat login terlebih dahulu, memilih barang yang tersedia, lalu mengisi form peminjaman.'
            ],
            [
                'question' => 'Apa saja barang yang bisa dipinjam?',
                'answer' => 'Barang yang bisa dipinjam meliputi alat tulis, elektronik, dan kebutuhan belajar lainnya.'
            ],
        ];
        return view('faq', compact('faqs', 'title'));
    }
}
