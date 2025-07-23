<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Traits\ImageUploadTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = City::all();
        $provincies = Province::all();
        Cache::forget('index.city');

        return view('admin.city.index', compact('module', 'provincies'));
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
            'province' => 'required',
            'name' => 'required',
            'title' => 'required',
            'image' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',

            'description' => 'required',
            'slug' => 'required',
        ]);
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/city');

        City::create([
            'province_id' => $request->province,
            'name' => $request->name,
            'sort' => 1,
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'keywords' => $request->keywords,
            'image_path' => $imagePath,
            'body' => $request->body,
            'slug' => $request->slug,
            'faq' => $request->faq,
        ]);
        Cache::forget('index.city');

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {

        $module = City::all();
        $edit_item = $city;
        $provincies = Province::all();

        return view('admin.city.index', compact('module', 'edit_item', 'provincies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'province' => 'required',
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);
        $image = $request->file('image');
        if (isset($image)) {
            if ($city) {
                try {
                    unlink(public_path($city->image_path));
                } catch (\Exception $e) {
                }
            }
            $imagePath = $this->uploadImages($image, 'uploads/city');

        } else {
            $imagePath = $city->image_path;
        }

        $city->update([
            'province_id' => $request->province,
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'keywords' => $request->keywords,
            'image_path' => $imagePath,
            'body' => $request->body,
            'slug' => $request->slug == $city->slug ? $request->slug : SlugService::createSlug(City::class, 'slug', $request->slug),

            'faq' => $request->faq,
        ]);
        Cache::forget('index.city');

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        try {
            unlink(public_path($city->image_path));
        } catch (\Exception $e) {
        }
        $city->comments()->delete();
        $city->delete();
        Cache::forget('index.city');

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
