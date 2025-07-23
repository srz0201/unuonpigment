<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $module = Category::where('category_id', null)->orderBy('sort')->get();

        return view('admin.category.index', compact(
            'module'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required',
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/category');

        if ($request->faq[0]['question'] == null) {
            $request['faq'] = null;
        }

        Category::create([
            'language_id' => $request->language_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'faq' => $request->faq,
            'body' => $request->body,
            'sort' => $request->sort,
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->slug),

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Category $category)
    {
        $module = Category::latest()->get();
        $edit_item = $category;

        return view('admin.category.index', compact(
            'module',
            'edit_item'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'language_id' => 'required',
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($category->image));
            } catch (Exception $e) {
            }

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/category');

        } else {
            $imagePath = $category->image;
        }

        if ($request->faq[0]['question'] == null) {
            $request['faq'] = null;
        }

        $category->update([
            'language_id' => $request->language_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'faq' => $request->faq,
            'body' => $request->body,
            'sort' => $request->sort,
            'slug' => $request->slug == $category->slug ? $request->slug : SlugService::createSlug(Category::class, 'slug', $request->slug),

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        if ($category->parentCategory) {
            return redirect(route('admin.sub-category-index', $category->parentCategory));
        }

        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        try {
            unlink(public_path($category->image));
        } catch (Exception $e) {
        }
        $category->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }

    public function subCategoryIndex(Category $category)
    {
        $parents = [];
        $i = clone $category;
        while ($i->parentCategory()->exists()) {
            array_push($parents, $i->parentCategory);
            $i = clone $i->parentCategory;
        }
        $parents = array_reverse($parents);

        return view('admin.category.subCategory', compact(
            'category', 'parents'
        ));
    }

    public function subCategoryStore(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);

        $imagePath = $this->upload_file_form($request, 'image', 'uploads/category', null);

        if ($request->faq[0]['question'] == null) {
            $request['faq'] = null;
        }

        Category::create([
            'language_id' => $category->language_id,
            'category_id' => $category->id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,

            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'faq' => $request->faq,
            'body' => $request->body,
            'sort' => $request->sort,
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->slug),

        ]);

        return back();
    }
}
