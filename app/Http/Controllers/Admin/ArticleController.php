<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\ImageUploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        \Artisan::call("cache:clear");
        $module = Article::latest()->get();

        return view('admin.article.index', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'thumb' => 'required',
            'description' => 'required',
            'lang' => 'required',
        ]);
        //upload image
        $thumb = $request->file('thumb');
        $thumbPath = $this->uploadImages($thumb, 'uploads/article/thumb');

        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/article');

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        Article::create([
            'title' => $request->title,
            'language_id' => $request->lang,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'keywords' => $request->keywords,
            'image_path' => $imagePath,
            'thumb_path' => $thumbPath,
            'status' => $status,
            'body' => $request->body,
            'url' => $request->url,
            'release' => null,
            'user_id' => auth()->user()->id,
            'faq' => $request->faq,

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $module = Article::latest()->get();
        $edit_item = $article;

        return view('admin.article.index', compact('module', 'edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'lang' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($article->image_path));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/article');

        } else {
            $imagePath = $article->image_path;
        }

        if (! is_null($request->file('thumb'))) {
            try {
                unlink(public_path($article->thumb_path));
            } catch (\Exception $e) {
            }

            $image = $request->file('thumb');
            $thumbPath = $this->uploadImages($image, 'uploads/article/thumb');

        } else {
            $thumbPath = $article->thumb_path;
        }

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        $article->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'image_path' => $imagePath,
            'thumb_path' => $thumbPath,
            'status' => $status,
            'body' => $request->body,
            'url' => $request->url,
            'release' => Carbon::parse($request->release),
            'faq' => $request->faq,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            unlink(public_path($article->image_path));
            unlink(public_path($article->thumb_path));
        } catch (\Exception $e) {
        }
        $article->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    public function galleryStore(Request $request)
    {
        $model = Article::find($request->model_id);
        if ($model) {
            $image = $request->file('file');
            //upload image
            $imagePath = $this->uploadImages($image, 'uploads/gallery');
            $thumbPath = $this->uploadImageThumb($imagePath, 'uploads/gallery/thumbnail', 500, 273);

            $model->gallery()->create([
                'image' => $imagePath,
                'thumb' => $thumbPath,
            ]);

        }

    }
}
