<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ImageUploadTrait;

    public $listing_cols = ['name', 'title', 'url'];

    public $tableHeads = ['نام', 'عنوان', 'آدرس', 'عکس'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Banner::all();

        return view('admin.banner.index', compact(
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
            'name' => 'required',
            'status' => 'numeric|max:1',
            'image' => 'required|max:500',
        ]);

        $image = $request->file('image');
        //upload image

        $imagePath = $this->uploadImages($image, 'uploads/banners');

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        Banner::create([
            'name' => $request->name,
            'title' => $request->title,
            'url' => $request->url,
            'status' => $status,
            'image_path' => $imagePath,
        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $module = Banner::all();

        $edit_item = $banner;

        return view('admin.banner.index', compact(
            'module',
            'edit_item',
            'banner'

        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'status' => 'numeric|max:1',
        ]);

        $image = $request->file('image');
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        if (isset($image)) {
            if ($banner) {
                unlink(public_path($banner->image_path));
            }
            $imagePath = $this->uploadImages($image, 'uploads/banners');

        } else {
            $imagePath = $banner->image_path;
        }
        $banner->update([
            'name' => $request->name,
            'title' => $request->title,
            'url' => $request->url,
            'status' => $status,
            'image_path' => $imagePath,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {

        unlink(public_path($banner->image_path));
        $banner->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();

    }

    public function status_chenge($id)
    {
        $slide = Banner::find($id);
        if ($slide->status == 1) {
            $slide->update(['status' => 0]);

            session()->flash('alert-success', ['با موفقیت انجام شد.']);

        } else {
            $slide->update(['status' => 1]);
            session()->flash('alert-success', ['با موفقیت انجام شد.']);

        }

        return back();

    }
}
