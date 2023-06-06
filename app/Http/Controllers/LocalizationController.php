<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function setLocale($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return response()->json(["success"=>true,"message"=>"Locale set to ".$locale.""], 201);
    }   
}
