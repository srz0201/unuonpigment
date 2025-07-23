<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Partner::latest()->get();

        return view('admin.partner.index', compact('module'));

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
            'title' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/partner');

        Partner::create([
            'language_id' => $request->lang,
            'title' => $request->title,
            'image' => $imagePath,
            'url' => $request->url,
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
    public function edit(Partner $partner)
    {

        $edit_item = $partner;

        return view('admin.partner.index', compact('edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {

        $request->validate([
            'title' => 'required',
        ]);

        //upload image
        $imagePath = $this->upload_file_form($request, 'image', 'uploads/partner', $partner);

        $partner->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'image' => $imagePath,
            'url' => $request->url,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.partner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        try {
            unlink(public_path($partner->image));
        } catch (\Exception $e) {
        }

        $partner->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
