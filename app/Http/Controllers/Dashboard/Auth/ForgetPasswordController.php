<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Events\Admin\PasswordForgotten;

class ForgetPasswordController extends Controller
{

    private $path = 'dashboard.auth.passwords'; 

    public function showForgetPasswordForm()
    {
        return view("{$this->path}.forget-password");
    }

    public function forgetPassword(Request $request)
    {
        
        $this->validateEmail($request);
        
        $admin = Admin::whereEmail($request->email)->first();

        $token = app('auth.password.broker')->createToken($admin);

        event(new PasswordForgotten($admin,$token));

        return redirect(route('dashboard.login'));
    }



    protected function validateEmail($request)
    {
        $request->validate([

            'email' => ['required','email','exists:admins,email']
        ]);
    }





    
}
