<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ImageUploadTrait;

    public $listing_cols = ['title', 'description', 'order'];

    public $tableHeads = ['عنوان', 'توضیح کوتاه', 'ترتیب'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Service::all();

        return view('admin.service.index', compact('module', 'tableHeads', 'listing_cols'));
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
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/service');

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'order' => $request->order,
            'image_path' => $imagePath,
            'slug' => $request->slug,
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
    public function edit(Service $service)
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Service::all();

        return view('admin.service.index', compact('module', 'tableHeads', 'listing_cols', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $image = $request->file('image');
        if (isset($image)) {
            if ($service) {
                unlink(public_path($service->image_path));
            }
            $imagePath = $this->uploadImages($image, 'uploads/service');

        } else {
            $imagePath = $service->image_path;
        }
        $service->slug = null;
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'order' => $request->order,
            'image_path' => $imagePath,
            'slug' => $request->slug,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Service::find($id);
        unlink(public_path($feature->image_path));
        $feature->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
