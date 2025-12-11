<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.users.home');
            }
            
            return redirect()->back()->withErrors([
                'email' => 'غير مصرح لك بالدخول إلى لوحة التحكم'
            ]);
        }

        return redirect()->back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.index');    }
}
