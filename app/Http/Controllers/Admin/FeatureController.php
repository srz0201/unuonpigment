<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use App\Traits\ImageUploadTrait;

class FeatureController extends Controller
{
    use ImageUploadTrait;

    public $listing_cols = ['title', 'description', 'order'];

    public $tableHeads = ['عنوان', 'توضیح', 'ترتیب'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Feature::all();

        return view('admin.feature.index', compact('module', 'tableHeads', 'listing_cols'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/feature');

        Feature::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'order' => $request->order,
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
    public function edit($id)
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $feature = Feature::find($id);

        $module = Feature::all();

        return view('admin.feature.index', compact('module', 'tableHeads', 'listing_cols', 'feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::find($id);
        $image = $request->file('image');
        if (isset($image)) {
            if ($feature) {
                unlink(public_path($feature->image_path));
            }
            $imagePath = $this->uploadImages($image, 'uploads/feature');

        } else {
            $imagePath = $feature->image_path;
        }

        $feature->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'order' => $request->order,
            'image_path' => $imagePath,
            'language_id' => $request->lang,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('feature.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);
        unlink(public_path($feature->image_path));
        $feature->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
