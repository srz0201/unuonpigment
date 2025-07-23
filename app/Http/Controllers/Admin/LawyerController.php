<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Lawyer;
use App\Models\Page;
use App\Models\Province;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LawyerController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $module = Lawyer::with(['city', 'province'])->get();
        $pages = Page::all();
        $provinces = Province::all();
        $cities = City::all();

        return view('admin.lawyer.index', compact('module', 'pages', 'provinces', 'cities'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'seo_title' => ['required'],
            'seo_description' => ['nullable'],
            'gender' => ['required'],
            'info' => ['required'],
            'is_promote' => ['boolean'],
            'is_show_info' => ['boolean'],
            'status' => ['boolean'],
            'body' => ['required'],
            'image' => ['image'],
        ]);
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/lawyers');

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }
        if ($request->is_promote) {
            $is_promote = $request->is_promote;
        } else {
            $is_promote = 0;
        }
        if ($request->is_show_info) {
            $is_show_info = $request->is_show_info;
        } else {
            $is_show_info = 0;
        }

        Lawyer::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'image' => $imagePath,
            'status' => $status,
            'is_show_info' => $is_show_info,
            'is_promote' => $is_promote,
            'body' => $request->body,
            'info' => $request->info,

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    public function edit(Lawyer $lawyer)
    {
        $module = Lawyer::with(['city', 'province'])->get();
        $edit_item = $lawyer;
        $pages = Page::all();
        $provinces = Province::all();
        $cities = City::all();

        return view('admin.lawyer.index', compact('module', 'edit_item', 'pages', 'provinces', 'cities'));
    }

    public function update(Request $request, Lawyer $lawyer)
    {

        $request->validate([
            'name' => ['required'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'seo_title' => ['required'],
            'seo_description' => ['nullable'],
            'gender' => ['required'],
            'info' => ['required'],
            'is_promote' => ['boolean'],
            'is_show_info' => ['boolean'],
            'status' => ['boolean'],
            'body' => ['required'],
            'image' => ['nullable'],
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($lawyer->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/lawyers');

        } else {
            $imagePath = $lawyer->image;
        }

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }
        if ($request->is_promote) {
            $is_promote = $request->is_promote;
        } else {
            $is_promote = 0;
        }
        if ($request->is_show_info) {
            $is_show_info = $request->is_show_info;
        } else {
            $is_show_info = 0;
        }

        $lawyer->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,

            'image' => $imagePath,
            'status' => $status,
            'is_show_info' => $is_show_info,
            'is_promote' => $is_promote,
            'body' => $request->body,
            'info' => $request->info,

        ]);
        Cache::forget('lawyer.'.$lawyer->slug);
        Cache::forget('lawyer.comments'.$lawyer->id);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.lawyer.index'));
    }

    public function delete(Lawyer $lawyer)
    {
        try {
            unlink(public_path($lawyer->image));
        } catch (\Exception $e) {
        }

        //        $lawyer->comments()->delete();
        $lawyer->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
