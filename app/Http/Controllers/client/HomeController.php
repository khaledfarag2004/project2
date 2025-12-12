<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\client\HomeRequest;
use App\Http\Requests\client\RegisterRequest;
use App\Http\Requests\client\UdpateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')->get();
        $users = User::all();
        return view('client.home', compact('courses'), compact('users'));
    }

    public function showLoginForm()
    {
        return view('client.login.login');
    }


    public function login(HomeRequest $request)
    {
        $data = $request->validated();

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
    public function register(RegisterRequest $request){
        $data = $request->validated();
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

    public function update(UdpateRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('home')->with('success','DONE.');

    }

    public function courses()
    {
        return view('client.course.create-course');
    }


}
