<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use App\Models\Media;
use App\Models\News;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::whereStatus(1)->latest()->get();
        $last_articles = Article::whereStatus(1)->latest()->limit(8)->get();
        $medias = Media::where('home', 1)->latest()->limit(5)->get();
        $partners = Partner::latest()->limit(6)->get();

        $pages = Page::limit(5)->get();

        return view('home.index', compact('sliders', 'last_articles',  'medias', 'pages', 'partners'));
    }
}
