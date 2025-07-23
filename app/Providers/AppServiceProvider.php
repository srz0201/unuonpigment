<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Link;
use App\Models\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        $languages = Cache::remember('index.languages', 360, function () {
            return Language::all();
        });


        $links = Cache::remember('index.links', 120, function () {
            return Link::orderBy('order','asc')->get();
        });

        $services = Cache::remember('index.services', 360, function () {
            return Page::all();
        });



        view()->share(compact( 'links','languages' , 'services'));
    }
}
