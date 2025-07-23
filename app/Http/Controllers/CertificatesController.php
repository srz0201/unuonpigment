<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Language;

class CertificatesController extends Controller
{
    public function __invoke($lang = 'fa')
    {

        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);
        $certificates = Certificate::lang($language->id)->latest()->get();
        return view('certificates.index', compact('certificates', 'language'));
    }
}
