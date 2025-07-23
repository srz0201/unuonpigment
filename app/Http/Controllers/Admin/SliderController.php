<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $module = Slider::latest()->get();

        return view('admin.slider.index', compact(
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
            'lang' => 'required',
            'status' => 'numeric|max:1',
            'image' => 'required|max:800',
        ]);

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/slider');

        Slider::create([
            'slogan' => $request->slogan,
            'description' => $request->description,
            'title' => $request->title,
            'url' => $request->url,
            'status' => $status,
            'image_path' => $imagePath,
            'language_id' => $request->lang,
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
    public function edit($id)
    {

        $module = Slider::latest()->get();

        $edit_item = Slider::find($id);

        return view('admin.slider.index', compact(
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
    public function update(Request $request, $id)
    {
        $request->validate([

            'lang' => 'required',
            'status' => 'numeric|max:1',
        ]);

        $slider = Slider::find($id);
        $image = $request->file('image');
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        if (isset($image)) {
            if ($slider) {
                try {
                    unlink(public_path($slider->image_path));
                } catch (\Exception $e) {
                }
            }
            $imagePath = $this->uploadImages($image, 'uploads/slider');

        } else {
            $imagePath = $slider->image_path;
        }
        $slider->update([
            'description' => $request->description,
            'title' => $request->title,
            'url' => $request->url,
            'status' => $status,
            'image_path' => $imagePath,
            'language_id' => $request->lang,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.home-slider.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $slide = Slider::find($id);
        try {
            unlink(public_path($slider->image_path));
        } catch (\Exception $e) {
        }

        $slide->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }

    public function status_chenge($id)
    {
        $slide = Slider::find($id);
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
