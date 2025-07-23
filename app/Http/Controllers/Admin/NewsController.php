<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = News::latest()->get();

        return view('admin.news.index', compact(
            'module'
        ));
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
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',

            'image' => 'required',
            'thumb' => 'required',
            'lang' => 'required',
        ]);

        $image = $request->file('image');
        //upload image
        //upload image
        $thumb = $request->file('thumb');
        $thumbPath = $this->uploadImages($thumb, 'uploads/news/thumb');

        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/news');

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        $news = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'image_path' => $imagePath,
            'thumb_path' => $thumbPath,
            'body' => $request->body,
            'status' => $status,
            'language_id' => $request->lang,
        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $newss)
    {
        $news = $newss;

        return view('admin.news.gallery', compact(
            'news'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $newss)
    {
        $edit_item = $newss;
        $module = News::latest()->get();

        return view('admin.news.index', compact(
            'edit_item',
            'module'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $newss)
    {
        $news = $newss;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',

            'lang' => 'required',
        ]);
        $image = $request->file('image');

        if (isset($image)) {
            if ($news) {
                try {
                    unlink(public_path($news->image_path));
                    unlink(public_path($news->thumb_path));
                } catch (\Exception $e) {
                }
            }
            $imagePath = $this->uploadImages($image, 'uploads/news');
            $thumbPath = $this->uploadImageThumb($imagePath, 'uploads/news/thumb', 400, 250);

        } else {
            $imagePath = $news->image_path;
            $thumbPath = $news->thumb_path;
        }

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'image_path' => $imagePath,
            'thumb_path' => $thumbPath,
            'body' => $request->body,
            'status' => $status,
            'language_id' => $request->lang,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.newss.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $newss)
    {
        $news = $newss;
        foreach ($news->gallery as $gallery) {
            try {
                unlink(public_path($gallery->image));
            } catch (\Exception $e) {
            }
            try {
                unlink(public_path($gallery->thumb_image));
            } catch (\Exception $e) {
            }
            $gallery->delete();
        }

        try {
            unlink(public_path($news->image));
            unlink(public_path($news->thumb_image));
        } catch (\Exception $e) {
        }
        $news->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }
}
