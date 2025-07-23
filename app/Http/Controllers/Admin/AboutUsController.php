<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = AboutUs::latest()->get();

        return view('admin.about_us.index', compact('module'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AboutUs  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $about)
    {

        $module = AboutUs::latest()->get();
        $edit_item = $about;

        return view('admin.about_us.index', compact('edit_item', 'module'));

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
            'image2' => 'required',
            'description' => 'required',
            'lang' => 'required',
        ]);
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/about');

        $image2 = $request->file('image2');
        $image2Path = $this->uploadImages($image2, 'uploads/about');

        $about_items = [
            'about_icon'        => $request->about_icon,
            'about_title'       => $request->about_title,
            'about_description' => $request->about_description,
        ];

        AboutUs::create([
            'title' => $request->title,
            'language_id' => $request->lang,
            'description' => $request->description,
            'image' => $imagePath,
            'image2' => $image2Path,
            'body' => $request->body,
            'video' => $request->video,
            'about_items' => json_encode($about_items),
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $about)
    {
//        return $request->about_items;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'lang' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($about->image));
            } catch (\Exception $e) {
            }
            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/about');
        } else {
            $imagePath = $about->image;
        }

        if (! is_null($request->file('image2'))) {
            try {
                unlink(public_path($about->image2));
            } catch (\Exception $e) {
            }
            $image2 = $request->file('image2');
            $image2Path = $this->uploadImages($image2, 'uploads/about');
        } else {
            $image2Path = $about->image2;
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'image2' => $image2Path,
            'body' => $request->body,
            'language_id' => $request->lang,
            'video' => $request->video,
            'about_items' => $request->about_items,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.about.index'));

    }

    public function destroy(AboutUs $about)
    {
        try {
            unlink(public_path($about->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($about->image2));
        } catch (\Exception $e) {
        }

        $about->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
