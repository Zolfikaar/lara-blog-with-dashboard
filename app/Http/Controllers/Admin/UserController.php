<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request ,$id)
    {
        $user = User::find($id);

        if($user) {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect(route('admin.users'))->with('success', 'User updated successfully');
        }

        return redirect(route('admin.users'))->with('fail', 'No user found');
    }
}
