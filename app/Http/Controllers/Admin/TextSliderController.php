<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TextSlider;
use Illuminate\Http\Request;

class TextSliderController extends Controller
{
    public $listing_cols = ['title', 'description'];

    public $tableHeads = ['عنوان', 'توضیح'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;
        $module = TextSlider::all();

        return view('admin.text_slider.index', compact(
            'tableHeads',
            'listing_cols',
            'types',
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
        TextSlider::create([
            'title' => $request->title,
            'description' => $request->description,
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
        $textSlider = TextSlider::find($id);
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;
        $module = TextSlider::latest()->get();

        return view('admin.text_slider.index', compact(
            'tableHeads',
            'listing_cols',
            'module',
            'textSlider'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = TextSlider::find($id);
        $module->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('text_slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = TextSlider::find($id);

        $module->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }
}
