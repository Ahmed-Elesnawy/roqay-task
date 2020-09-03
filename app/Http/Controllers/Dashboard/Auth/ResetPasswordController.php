<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    private $path = "dashboard.auth.passwords";

    public function showResetPasswordForm($token)
    {
        $tokenExists = DB::table('password_resets')->whereToken($token)->exists();
        
        abort_if(!$tokenExists,404);

        return view("{$this->path}.reset-password",compact('token'));
    }


    public function resetPassword(Request $request,$token)
    {
        $password = $this->validatePassword($request);

        $admin = $this->getAdminToReset($token);

        $admin->update($password);

        DB::table('password_resets')->whereEmail($admin->email)->delete();

        auth()->guard('admin')->login($admin);

        return redirect(route('dashboard.index'));

    }





    protected function getAdminToReset($token)
    {
        $email = DB::table('password_resets')
            ->whereToken($token)
            ->first()
            ->email;
            

        return Admin::whereEmail($email)->first();
    }

    protected function validatePassword($request)
    {
        return $request->validate([

            'password' => ['required','confirmed','min:3']

        ]);

    }
}
