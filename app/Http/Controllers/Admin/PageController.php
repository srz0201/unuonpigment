<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Page::latest()->get();

        return view('admin.page.index', compact('module'));
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
            'seo_title' => 'required',
            'seo_description' => 'required',

            'description' => 'required',
            'lang' => 'required',
            'slug' => 'required',
        ]);
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/page');

        Page::create([
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'keywords' => $request->keywords,
            'image_path' => $imagePath,
            'body' => $request->body,
            'slug' => $request->slug,
            'language_id' => $request->lang,
            'faq' => $request->faq,

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);
        \Cache::forget('index.services');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        $module = Page::all();
        $edit_item = $page;

        return view('admin.page.index', compact('module', 'edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',

            'lang' => 'required',
            'slug' => 'required',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            if ($page) {
                try {
                    unlink(public_path($page->image_path));
                } catch (\Exception $e) {
                }
            }
            $imagePath = $this->uploadImages($image, 'uploads/page');

        } else {
            $imagePath = $page->image_path;
        }
        $page->slug = null;
        $page->update([
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'keywords' => $request->keywords,
            'image_path' => $imagePath,
            'body' => $request->body,
            'slug' => $request->slug,
            'language_id' => $request->lang,
            'faq' => $request->faq,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);
        \Cache::forget('index.services');

        return redirect(route('admin.page.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            unlink(public_path($page->image_path));
        } catch (\Exception $e) {
        }

        $page->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);
        \Cache::forget('index.services');

        return redirect()->back();
    }

    public function galleryStore(Request $request)
    {
        $model = Page::find($request->model_id);
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
