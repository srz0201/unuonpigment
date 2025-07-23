<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Comment::latest()->where('commentable_type', '!=', null)->get();

        return view('admin.comment.index', compact('module'));
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

    public function store(Request $request)
    {
        Comment::create([
            'body' => $request->body,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'name' => 'مدیر',
            'status' => 1,
        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Comment $comment)
    {

        if ($comment->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $comment->update([
            'status' => $status,
        ]);
        Cache::forget('article.comments'.$comment->commentable_id);
        Cache::forget('page.comments'.$comment->commentable_id);
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {

        $comment->response()->delete();
        $comment->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }
}
