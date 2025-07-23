<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Language;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($lang = 'fa')
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $pages = Page::lang($language->id)->latest()->paginate(8);
        $last_news = News::lang($language->id)->whereStatus(1)->latest()->limit(5)->get();

        return view('page.index', compact('pages', 'last_news'));

    }

    public function single($slug)
    {

        $page = Page::whereSlug($slug)->first();
        if (! $page) {
            abort(404);
        }
        changeLanguageSession($page->language);

        $otherPages = Page::lang($page->language->id)->latest()->where('id', '!=', $page->id)->limit(5)->get();
        $topArticles = Article::lang($page->language->id)->latest()->limit(5)->get();

        return view('page.single', compact('page' , 'otherPages', 'topArticles'));

    }

    public function storeComment(Request $request, Page $page)
    {
        //        if ($this->recaptcha3($request) == false){
        //            session()->flash('alert-warning', [' خطای ریکپچا! لطفا صفحه را بروز کنید.']);
        //            return back()->withInput();
        //        }

        $request->validate([
            'body' => 'required',
        ]);

        if ($request['name'] == '') {
            $request['name'] = 'میهمان';
        }
        $page->comments()->create([
            'body' => $request->body,
            'name' => $request->name,
            'contact_id' => $request->contact_id,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
