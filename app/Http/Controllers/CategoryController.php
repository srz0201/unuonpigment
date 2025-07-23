<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereCategoryId(null)->latest()->paginate(9);
        return view('category.index', compact('categories'));



//        $category = Category::whereSlug($slug)->first();
//        if ($category) {
//
//            changeLanguageSession($category->language);
//            if (count($category->subCategories) > 0) {
//                return view('category.index', compact('category'));
//            } else {
//                $products = Product::whereCategory_id($category->id)->latest()->paginate(15);
//
//                return view('product.index', compact('category', 'products'));
//            }
//        } else {
//            abort('404');
//        }

    }
}
