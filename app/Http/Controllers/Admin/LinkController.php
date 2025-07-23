<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $module = Link::orderBy('order', 'asc')->get();

        return view('admin.quickLink.index', compact(
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
        Link::create($request->all());

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {

        $module = Link::orderBy('order', 'asc')->get();
        $edit_item = $link;

        return view('admin.quickLink.index', compact(
            'module',
            'edit_item',
            'link'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $link->update($request->all());
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.links.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.links.index'));
    }
}
