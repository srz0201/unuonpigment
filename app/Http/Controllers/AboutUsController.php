<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Certificate;
use App\Models\Download;
use App\Models\Language;
use App\Models\Partner;

class AboutUsController extends Controller
{
    public function index($lang = 'fa')
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $about_us = AboutUs::lang($language->id)->first();
        $certificates = Certificate::lang($language->id)->latest()->get();

        return view('about.index', compact('about_us', 'certificates'));

    }
}
