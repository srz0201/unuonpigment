<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->latest()->paginate(9);
        return view('product.index', compact('products', 'category'));
    }

    public function single($slug)
    {

        $product = Product::whereSlug($slug)->first();
        if ($product) {
            $similar_products = Product::whereCategory_id($product->category_id)->limit(3)->get();
            $galleries = $product->gallery()->get();
            $table_lists = $product->tableLists()->get();
            return view('product.single', compact('product', 'similar_products' , 'galleries' , 'table_lists'));
        } else {
            abort('404');
        }

    }

    public function comment(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required|max:800',
        ]);
        if (auth()->check()) {
            $user = auth()->user()->id;
        } else {
            $user = null;
        }

        Comment::create([
            'name' => $request->name,
            'body' => $request->body,
            'contact_id' => $request->contact_id,
            'user_id' => $user,
            'commentable_id' => $product->id,
            'commentable_type' => get_class($product),
        ]);

        session()->flash('alert-success', ['دیدگاه شما با موفقیت ثبت شد.']);

        return back();

    }

    public function search(Request $request)
    {
        $q = $request->q;
        $language = Language::where('brevity', $request->lang)->first();
        changeLanguageSession($language);
        //        $products = Product::whereLanguage_id($language->id)
        //            ->where('title' , 'LIKE','%'.$request->q.'%')
        //            $query->orWhere('title','LIKE',"%$request->q%");
        //            ->latest()->paginate(6);
        //

//        changeLanguageSession(config('app.locale'));

        $products = Product::where(function ($query) use ($request) {
            $query->where('title', 'LIKE', '%'.$request->q.'%');
            $query->orWhere('description', 'LIKE', "%$request->q%");
        });

        $products = $products->latest()->paginate(15);


        return view('product.search', compact('products', 'q'));
    }
}
