<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show() {
        $users = User::all();
        return view('admin.users_manage.show', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users_manage.show', compact('user'));
    }

}

