<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('auth.login');
        }
    }
}
