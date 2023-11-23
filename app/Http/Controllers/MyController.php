<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect("/admin")->with('success', 'Logged in successfully.');
            } else {
                Auth::logout();
                return redirect('/admin/login')->with('error', 'Not authorized as admin.');
            }
        } else {
            return redirect('/admin/login')->with('error', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
