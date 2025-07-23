<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::whereStatus(1)->latest()->paginate(9);

        return view('article.index', compact('articles'));

    }

    public function single($slug)
    {
        $article = Article::whereSlug($slug)->first();

        if ($article) {
            $topArticles = Article::where('slug','!=', $slug)->orderBy('view_count', 'desc')->limit(5)->get();

            return view('article.single', compact('article', 'topArticles'));
        } else {
            abort(404);
        }

    }

    public function search(Request $request)
    {
        if ($request->q != '') {
            $articles = Article::orWhere('title', 'LIKE', "%$request->q%")
                ->orWhere('description', 'LIKE', "%$request->q%")
                ->orWhere('keywords', 'LIKE', "%$request->q%")
                ->latest()->paginate(15);

            return view('article.index', compact('articles'));

        } else {
            abort('404');
        }
    }

    public function storeComment(Request $request, Article $article)
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
        $article->comments()->create([
            'body' => $request->body,
            'name' => $request->name,
            'contact_id' => $request->contact_id,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
