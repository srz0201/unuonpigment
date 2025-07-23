<?php

use App\Models\Banner;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

function convert($string)
{
    $western = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $eastern = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    return str_replace($western, $eastern, $string);
}

function convert_ew($string)
{
    $western = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $eastern = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    return str_replace($eastern, $western, $string);
}

function randomId()
{

    $code = random_int(1111, 9999);

    $validator = Validator::make(['activation_code' => $code], ['activation_code' => 'unique:mobile_verifieds']);

    if ($validator->fails()) {
        $this->randomId();
    }

    return $code;
}

function changeLanguageSession(Language $language)
{
    Session(['lang' => $language->brevity]);
    App::setLocale(Session('lang'));
}
function getLangId()
{
    if (! session()->has('lang')) {
        Session(['lang' => 'fa']);
    }

    $language = Language::where('brevity', session('lang'))->first();

    return $language->id;
}
function setting()
{
    $setting = \App\Models\Setting::where('language_id', getLangId())->first();
    if ($setting) {
        return $setting;
    } else {
        return null;
    }

}
function theme_config()
{
    $setting = \App\Models\Setting::where('language_id', getLangId())->first();
    if ($setting) {
        return $setting->theme_config;
    } else {
        return null;
    }

}
function getCategories()
{
    $categories = \App\Models\Category::where('language_id', getLangId())->where('category_id', null)->orderBy('sort')->with('subCategories')->get();
    if ($categories) {
        return $categories;
    } else {
        return null;
    }

}

function getBanner($name)
{
    $banners = Cache::remember('boot.banners', 41600, function () {
        return Banner::whereStatus(true)->get();
    });

    $banner = $banners->where('name', $name)->first();
    if ($banner) {
        return $banner;
    }

    return null;
}

function printDateTime($dateTime)
{

    if (session('lang') == 'fa') {
        return convert(\Morilog\Jalali\Jalalian::forge($dateTime)->format('Y/m/d'));
    }

    return \Carbon\Carbon::parse($dateTime)->format('d M Y');
}
