<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
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

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
       $validate = $request->validated();

        $user->update($validate);

        return redirect()->back()->with('success', 'User updated successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح');    }

}
