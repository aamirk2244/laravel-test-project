<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function signin(Request $request)
    {
        // dd("email=> {$request->email}, password=> {$request->password}");
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('tasks');
        } else {
            return back()->with('status', 'Invalid login details');
        }
    }

    public function new()
    {
        return view('login.new');
    }

    public function logout()
    {
        auth()->logout();
        // dd(redirect()->route('login')->getTargetUrl());

        return redirect()->route('session');
    }
}
