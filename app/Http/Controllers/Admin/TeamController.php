<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ImageUploadTrait;

    public $listing_cols = ['position', 'name', 'email'];

    public $tableHeads = ['مقام', 'نام ', 'ایمیل'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Team::latest()->get();

        return view('admin.team.index', compact('module', 'tableHeads', 'listing_cols'));
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
            'position' => 'required',
            'image' => 'required',
            'name' => 'required',
            'lang' => 'required',
        ]);
        //upload image
        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/team');

        Team::create([
            'position' => $request->position,
            'language_id' => $request->lang,
            'name' => $request->name,
            'biography' => $request->biography,
            'image' => $imagePath,
            'email' => $request->email,
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
    public function edit(Team $team)
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Team::latest()->get();

        return view('admin.team.index', compact('module', 'tableHeads', 'listing_cols', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'position' => 'required',
            'name' => 'required',
            'lang' => 'required',
        ]);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($team->image));
            } catch (\Exception $e) {
            }
            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/team');

        } else {
            $imagePath = $team->image;
        }

        $team->update([
            'position' => $request->position,
            'language_id' => $request->lang,
            'name' => $request->name,
            'biography' => $request->biography,
            'image' => $imagePath,
            'email' => $request->email,
        ]);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('team.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            unlink(public_path($team->image));
        } catch (\Exception $e) {
        }
        $team->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
