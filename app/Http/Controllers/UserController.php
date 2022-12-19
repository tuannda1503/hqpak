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

    public function show(Request $request)
    {
        $user = User::find($request->id);

        return view('pages.users.user-detail', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required',
            'phone' => 'required|max:10',
            'about' => 'required:max:150',
            'location' => 'required'
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->about = $request->about;
        $user->location = $request->location;

        $user->save();
        return back()->withStatus('User successfully updated.');
    }
}
