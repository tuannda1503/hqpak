<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('pages.users.users', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->id);

        return view('pages.users.user-detail', compact('user'));
    }
}
