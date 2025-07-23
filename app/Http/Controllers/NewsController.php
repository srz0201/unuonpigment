<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($lang = 'fa')
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $news = News::lang($language->id)->whereStatus(1)->latest()->paginate(15);
        $topArticles = Article::lang($language->id)->whereStatus(1)->limit(3)->get();

        return view('news.index', compact('news', 'topArticles'));

    }

    public function single($slug)
    {

        $news = News::whereSlug($slug)->first();
        if ($news) {
            changeLanguageSession($news->language);

            $otherNews = News::lang($news->language->id)->latest()->where('id', '!=', $news->id)->limit(5)->get();
            $topArticles = Article::lang($news->language->id)->latest()->limit(5)->get();

            return view('news.single', compact('news', 'topArticles', 'otherNews'));
        } else {
            abort('404');
        }

    }

    public function storeComment(Request $request, News $news)
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
        $news->comments()->create([
            'body' => $request->body,
            'name' => $request->name,
            'contact_id' => $request->contact_id,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
