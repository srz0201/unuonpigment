<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public $listing_cols = ['name', 'phone', 'body'];

    public $tableHeads = ['نام', 'شماره تماس', 'متن', 'وضعیت'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = $this->tableHeads;
        $listing_cols = $this->listing_cols;

        $module = Message::latest()->where('department', '!=', 'criticisms')->get();
        $criticisms = Message::latest()->where('department', 'criticisms')->get();

        return view('admin.message.index', compact('module', 'criticisms', 'tableHeads', 'listing_cols'));

    }

    public function status(Message $message)
    {
        if ($message->status == 0) {
            $message->update(['status' => 1]);
        } else {
            $message->update(['status' => 0]);
        }

        return redirect(route('message.index'));
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
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }
}
