<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizationController extends Controller
{
    public function setLanguage(Request $request)
    {
        if(!in_array($request->get('lang', ''), LaravelLocalization::getSupportedLanguagesKeys()))
            return back();

        LaravelLocalization::setLocale($request->lang);
        return redirect(LaravelLocalization::getLocalizedUrl($request->lang,  back()->getTargetUrl()));
    }
}
