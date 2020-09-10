<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    public function changeLang($lang)
    {
        App::setLocale($lang);

        session()->put('lang', $lang);

        return back();
    }
}
