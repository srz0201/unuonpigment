<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Download::latest()->get();

        return view('admin.download.index', compact('module'));

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
            'file' => 'required',
        ]);

        $image = $request->file('file');
        $imagePath = $this->uploadImages($image, 'uploads/files');

        Download::create([
            'language_id' => $request->lang,
            'title' => $request->title,
            'file' => $imagePath,
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
    public function edit(Download $download)
    {

        $edit_item = $download;

        return view('admin.download.index', compact('edit_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {

        $request->validate([
            'title' => 'required',
        ]);

        //upload image
        $imagePath = $this->upload_file_form($request, 'file', 'uploads/files', $download);

        $download->update([
            'language_id' => $request->lang,
            'title' => $request->title,
            'file' => $imagePath,

        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.download.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        try {
            unlink(public_path($download->file));
        } catch (\Exception $e) {
        }

        $download->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
