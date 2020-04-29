<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Comments;
        $blog->content = $request->content;
        $blog->blog_id = $request->blog_id;
        $blog->save();

        return response()->json($blog);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments, $id)
    {
        $comments = Comments::where('id', $id)->first();
        $comments->content = $request->content;
        $comments->blog_id = $request->blog_id;
        $comments->save();

        return response()->json($comments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        $comments->delete();
        return response()->json($comments);
    }
}
