<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Setting::latest()->get();

        return view('admin.setting.index', compact(
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $edit_item = $setting;
        $theme_config = $setting->theme_config;

        $module = Setting::latest()->get();

        return view('admin.setting.index', compact(
            'module', 'edit_item', 'theme_config'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $setting = Setting::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required|max:250',
            'logo' => 'mimes:jpeg,bmp,png|max:1000',
            'fave_logo' => 'mimes:jpeg,bmp,png|max:500',
            'lang' => 'required',

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $logo = $request->file('logo');
        $fave = $request->file('fave_logo');
        //upload image
        if (isset($logo)) {
            try {
                unlink(public_path($setting->logo));
            } catch (\Exception $e) {
            }

            $logoPath = $this->uploadImages($logo, 'uploads/setting');
        } else {
            $logoPath = $setting->logo;
        }

        if (isset($fave)) {
            try {
                unlink(public_path($setting->fave_logo));
            } catch (\Exception $e) {
            }
            $favePath = $this->uploadImages($fave, 'uploads/setting');
        } else {
            $favePath = $setting->fave_logo;
        }

        $theme_config = [
            'home_about_title' => $request->home_about_title,
            'home_about_description' => $request->home_about_description,
            'home_about_image1' => $request->home_about_image1,
            'home_about_image2' => $request->home_about_image2,
            'home_about_items' => $request->home_about_items,
            'home_about_video' => $request->home_about_video,

            'home_footer_about' => $request->home_footer_about,
            'home_footer_map' => $request->home_footer_map,
            'home_footer_items' => $request->home_footer_items,
        ];

        $setting->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'logo' => $logoPath,
            'fave_logo' => $favePath,
            'language_id' => $request->lang,
            'theme_config' => $theme_config,
        ]
        );

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
