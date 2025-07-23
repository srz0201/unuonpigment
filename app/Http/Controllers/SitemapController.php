<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap', 60);

        if (! $sitemap->isCached()) {
            $sitemap->add(URL::to('/'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/fa/articles'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en/articles'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/fa/gallery'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en/gallery'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/fa/media'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en/media'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/fa/about-us'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en/about-us'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/fa/contact_us'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');
            $sitemap->add(URL::to('/en/contact_us'), '2022-05-25T20:10:00+02:00', '1.0', 'weekly');

            $sitemap->add(URL::to('/sitemap/products'), '2022-05-26T12:30:00+02:00', '0.9', 'weekly');
            $sitemap->add(URL::to('/sitemap/pages'), '2022-05-26T12:30:00+02:00', '0.7', 'weekly');
            $sitemap->add(URL::to('/sitemap/articles'), '2022-05-26T12:30:00+02:00', '0.8', 'weekly');
            $sitemap->add(URL::to('/sitemap/category'), '2022-05-26T12:30:00+02:00', '0.8', 'weekly');

        }

        return $sitemap->render('xml');

    }

    public function products()
    {
        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap.products', 120);

        if (! $sitemap->isCached()) {

            $complexs = Product::whereStatus(1)->get();
            foreach ($complexs as $item) {

                $images = [];
                $images[] = [
                    'url' => asset($item->image_path),
                    'title' => $item->title,
                    'caption' => $item->description,
                ];

                foreach ($item->gallery as $gallery) {
                    $images[] = [
                        'url' => asset($gallery->image),
                        'title' => $item->title,
                        'caption' => $item->description,
                    ];
                }

                $sitemap->add(URL::to($item->path()), $item->updated_at, '0.9', 'daily', $images);

            }

        }

        return $sitemap->render('xml');

    }

    public function pages()
    {
        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap.pages', 720);

        if (! $sitemap->isCached()) {

            $pages = Page::get();
            foreach ($pages as $item) {
                $sitemap->add(URL::to($item->path()), $item->updated_at, '0.8', 'daily');
            }

        }

        return $sitemap->render('xml');

    }

    public function articles()
    {
        $sitemap = App::make('sitemap');

        $sitemap->setCache('laravel.sitemap.articles', 720);

        if (! $sitemap->isCached()) {

            $pages = Article::whereStatus(1)->get();
            foreach ($pages as $item) {
                $sitemap->add(URL::to($item->path()), $item->updated_at, '0.7', 'daily');
            }

        }

        return $sitemap->render('xml');

    }

    public function category()
    {
        $sitemap = App::make('sitemap');

        cache()->forget('laravel.sitemap.category');

        $sitemap->setCache('laravel.sitemap.category', 720);

        if (! $sitemap->isCached()) {

            $categories = Category::get();
            foreach ($categories as $item) {
                $sitemap->add(URL::to(\url($item->path())), $item->created_at, '0.8', 'weekly');
            }

        }

        return $sitemap->render('xml');

    }
}
