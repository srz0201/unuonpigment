<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Media;

class MediaController extends Controller
{
    public function index($lang = 'fa')
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $medias = Media::lang($language->id)->latest()->paginate(12);

        return view('media.index', compact(
            'medias'
        ));
    }
}
