<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Language;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request, $lang = 'fa')
    {

        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $galleries = Gallery::where('galleryable_type', 'App\Models\Gallery')->latest()->paginate(22);

        return view('gallery.index', compact(
            'galleries'
        ));
    }
}
