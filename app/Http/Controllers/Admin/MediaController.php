<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Media::latest()->get();

        return view('admin.media.index', compact('module'));
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
        ]);

        $imagePath = null;
        if ($request->image) {
            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/media');
        }

        $videoPath = null;
        if ($request->video) {
            $video = $request->file('video');
            $videoPath = $this->uploadImages($video, 'uploads/media/video');
        }

        if ($request->home) {
            $home = $request->home;
        } else {
            $home = 0;
        }

        Media::create([
            'language_id' => $request->lang,
            'title' => $request->title,
            'image' => $imagePath,
            'video' => $videoPath,
            'iframe' => $request->iframe,
            'home' => $home,
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
    public function edit(Media $video)
    {
        $edit_item = $video;
        $module = Media::latest()->get();

        return view('admin.media.index', compact('module', 'edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $video)
    {

        $request->validate([
            'title' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($video->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/media');
        } else {
            $imagePath = $video->image;
        }

        //video
        if (! is_null($request->file('video'))) {
            try {
                unlink(public_path($video->video));
            } catch (\Exception $e) {
            }

            $videoReq = $request->file('video');
            $videoPath = $this->uploadImages($videoReq, 'uploads/media/video');

        } else {
            $videoPath = $video->video;
        }

        if ($request->home) {
            $home = $request->home;
        } else {
            $home = 0;
        }

        $video->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'image' => $imagePath,
            'video' => $videoPath,
            'iframe' => $request->iframe,
            'home' => $home,
        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.video.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $video)
    {
        try {
            unlink(public_path($video->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($video->video));
        } catch (\Exception $e) {
        }

        $video->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
