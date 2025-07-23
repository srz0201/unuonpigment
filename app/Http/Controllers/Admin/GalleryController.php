<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Gallery::where('galleryable_type', 'App\Models\Gallery')->latest()->get();

        return view('admin.gallery.index', compact('module'));
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
        ]);
        //upload image
        $thumb = $request->file('image');
        $thumbPath = $this->uploadImageThumb($thumb, 'uploads/gallery/thumb', 350, null);

        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/gallery');

        Gallery::create([
            'galleryable_type' => 'App\Models\Gallery',
            'galleryable_id' => 1,
            'title' => serialize($request->title),
            'image' => $imagePath,
            'thumb' => $thumbPath,
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {

        $module = Gallery::where('galleryable_type', 'App\Models\Gallery')->latest()->get();

        $edit_item = $gallery;

        return view('admin.gallery.index', compact('module', 'edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        $request->validate([
            'title' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($gallery->image));
            } catch (\Exception $e) {
            }
            try {
                unlink(public_path($gallery->thumb));
            } catch (\Exception $e) {
            }

            $thumb = $request->file('image');
            $thumbPath = $this->uploadImageThumb($thumb, 'uploads/gallery/thumb', 350, null);

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/gallery');

        } else {
            $imagePath = $gallery->image_path;
            $thumbPath = $gallery->thumb_path;
        }

        $gallery->update([
            'title' => serialize($request->title),
            'image' => $imagePath,
            'thumb' => $thumbPath,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.galleries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        try {
            unlink(public_path($gallery->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($gallery->thumb_image));
        } catch (\Exception $e) {
        }

        $gallery->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
