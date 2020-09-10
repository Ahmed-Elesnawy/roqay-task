<?php

use Illuminate\Support\Facades\Route;






Route::prefix('admin')->name('dashboard.')->group(function(){

     

    Route::namespace('Auth')->group(function(){
        

        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::post('login','LoginController@login');

        Route::get('forget-password','ForgetPasswordController@showForgetPasswordForm')->name('forget-password');
        Route::post('forget-password','ForgetPasswordController@forgetPassword');

        Route::get('reset-password/{token}','ResetPasswordController@showResetPasswordForm')->name('reset-password');
        Route::post('reset-password/{token}','ResetPasswordController@resetPassword');

    });



    Route::middleware('admin')->group(function(){

        Route::get('home','HomeController@index')->name('index');
        Route::post('logout','Auth\LogoutController@logout')->name('logout');


        // Users Routes 

        Route::resource('users','UserController')->except('show');

        // Admins Routes 

        Route::resource('admins','AdminController')->except('show');

        // Categories Routes 

        Route::resource('categories','CategoryController')->except(['show']);

        // Products Routes 

        Route::resource('products','ProductController')->except(['show']);

        // Roles Routes

        Route::resource('roles','RoleController');

        // Langs routes 

        Route::get('{lang}','LangController@changeLang')->name('langs.change');


    

    });

});
