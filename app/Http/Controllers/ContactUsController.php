<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Language;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index($lang = 'fa')
    {
        $language = Language::whereBrevity($lang)->first();
        if (! $language) {
            abort('404');
        }
        changeLanguageSession($language);

        $about_us = AboutUs::lang($language->id)->first();

        return view('contact.index', compact('about_us'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'body' => 'required',
        ]);


        Message::create([
            'name' => $request->name,
            'body' => $request->body,
            'phone' => $request->phone,
        ]);


        session()->flash('alert-success', ['پیام شما با موفقیت ثبت شد.']);

        return back();
    }
}
