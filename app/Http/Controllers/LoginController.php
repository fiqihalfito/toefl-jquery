<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function makeSession(Request $request)
    {
        $request->session()->put('name', $request->input('name'));

        return redirect()->intended('exam/welcome');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
