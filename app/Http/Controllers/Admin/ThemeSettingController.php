<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThemeSettingController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::latest()->first();
        $theme_config = unserialize($setting->theme_config);

        Cache::forget('index.setting');

        return view('admin.setting.theme_setting', compact(
            'setting', 'theme_config'
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

        //        dd($request->all());

        $home_video_video = $request->file('home_video_video');
        if (isset($home_video_video)) {
            try {
                unlink(public_path($setting->theme_config['home_video_video']));
            } catch (\Exception $e) {
            }

            $home_video_videoPath = $this->uploadImages($home_video_video, 'uploads/setting');
        } else {
            if (isset(unserialize($setting->theme_config)['home_video_video'])) {
                $home_video_videoPath = unserialize($setting->theme_config)['home_video_video'];
            } else {
                $home_video_videoPath = null;
            }
        }

        $home_video_banner = $request->file('home_video_banner');
        if (isset($home_video_banner)) {
            try {
                unlink(public_path($setting->theme_config['home_video_banner']));
            } catch (\Exception $e) {
            }

            $home_video_bannerPath = $this->uploadImages($home_video_banner, 'uploads/setting');
        } else {
            $home_video_bannerPath = unserialize($setting->theme_config)['home_video_banner'];
        }

        $theme_config = [
            'home_about_title' => $request->home_about_title,
            'home_about_description' => $request->home_about_description,
            'home_about_image' => $request->home_about_image,

            'home_video_mini_title' => $request->home_video_mini_title,
            'home_video_title' => $request->home_video_title,
            'home_video_desc' => $request->home_video_desc,
            'home_video_items' => $request->home_video_items,
            'home_video_video' => $home_video_videoPath,

            'home_services' => $request->home_services,
            'home_faq' => $request->home_faq,

            'home_video_banner' => $home_video_bannerPath,

            'footer_about_about' => $request->footer_about_about,
            'footer_about_address' => $request->footer_about_address,
            'footer_about_phone' => $request->footer_about_phone,
            'footer_about_email' => $request->footer_about_email,
            'footer_services' => $request->footer_services,
        ];

        $setting->update([
            'theme_config' => serialize($theme_config),
        ]
        );
        Cache::forget('index.setting');
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
