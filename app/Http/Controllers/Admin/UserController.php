<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $courses = Course::all();
        return view('admin.home.home', compact('courses'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
       $validate = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validate);

        return redirect()->back()->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully');
    }

}
