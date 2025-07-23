<?php

namespace App\Http\Controllers;

use App\Models\Language;

class LanguageController extends Controller
{
    public function change($lang)
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        return redirect(route('home', $lang));
    }
}
