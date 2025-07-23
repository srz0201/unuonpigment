<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Certificate::latest()->get();

        return view('admin.certificate.index', compact('module'));

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
        $imagePath = $this->uploadImages($image, 'uploads/certificate');

        certificate::create([
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
    public function edit(Certificate $Certificate)
    {

        $edit_item = $Certificate;

        return view('admin.certificate.index', compact('edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {

        $request->validate([
            'title' => 'required',
        ]);

        //upload image
        $imagePath = $this->upload_file_form($request, 'image', 'uploads/certificate', $certificate);

        $certificate->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'image' => $imagePath,
            'url' => $request->url,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.certificate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        try {
            unlink(public_path($certificate->image));
        } catch (\Exception $e) {
        }

        $certificate->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
