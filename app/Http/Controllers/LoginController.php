<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    function view_login() {
        return view('admin.login');
    }

    function view_register() {
        return view('admin.register');
    }

    function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'username'=> 'required',
            'password' => 'required'
        ]);

        $new_user = new User;
        $new_user->name = $validatedData['name'];
        $new_user->username = $validatedData['username'];
        $new_user->password = Hash::make($validatedData['password']);
        $new_user->save();

        return redirect('/admin/login')->with('success', 'Registration Success!');
    }

    function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username'=>$username, 'password'=>$password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with([
            'loginError' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}