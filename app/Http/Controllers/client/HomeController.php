<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $users = User::all();
        return view('client.home', compact('courses'), compact('users'));
    }

    public function showLoginForm()
    {
        return view('client.login.login');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }


    public function showRegisterForm()
    {
      return view('client.register.register');
    }
    public function register(Request $request){
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required|string|max:20',
            'role'     => 'required|string',
            'country'  => 'required|string',
            'password' => 'required|min:6'
        ]);
        $data['password'] = Hash::make($data['password']);
        $user=User::query()->create($data);
        auth()->login($user);
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function show()
    {
        $user=Auth::user();
        return view('client.showprofile.show-profile', compact('user'));
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'تم حذف الحساب بنجاح');

    }

    public function edit()
    {
        $user = Auth::user();
        return view('client.showprofile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'role'     => 'required|string',
            'country'  => 'required|string',
        ]);
        $user->update($data);
        return redirect()->route('home')->with('success','DONE.');

    }

    public function courses()
    {
        return view('client.course.create-course');
    }


}
