<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Advice::latest()->get();
        $advice = unserialize(Setting::latest()->first()->advice_config);

        return view('admin.advice.index', compact('module', 'advice'));
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
    public function edit(Advice $advice)
    {
        $module = Advice::latest()->get();
        $edit_item = $advice;

        return view('admin.advice.index', compact('module', 'edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advice $advice)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $advice->update([
            'status' => $request->status,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.advice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $advice)
    {
        $advice->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    public function adviceUpdateBody(Request $request)
    {

        $body = [
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'faq' => $request->faq,
        ];

        Setting::first()->update([
            'advice_config' => serialize($body),
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
