<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show() {
        $users = User::all();
        $title = 'user';
        return view('admin.users_manage.show', compact('users', 'title'));
    }

    public function edit(User $user)
    {
        $title = 'edit-user';
        return view('admin.users_manage.show', compact('user', 'title'));
    }

}

