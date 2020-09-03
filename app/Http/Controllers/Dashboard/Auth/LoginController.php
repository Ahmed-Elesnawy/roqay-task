<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('authadmin');
    }

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $this->validateLogin($request);

        $remember    = $request->has('remember') ? true : false;

        if (Auth::guard('admin')->attempt($credentials,$remember))
        {
            return redirect()->route('dashboard.index');
        }

        return back();

        
    }



    





    protected function validateLogin($request)
    {
       return $request->validate([

            'email'    => 'required|email|max:255',
            'password' => 'required|min:5',
        ]);
    }
}
