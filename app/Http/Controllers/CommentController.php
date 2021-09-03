<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    
        $this->validate($request,[
            'fullName' => 'required',
            'email' => 'required',
         ]);

        Post::findOrfail($request->post_id)->comments()->create([
            "fullName"=>$request->fullName,
            "email"=>$request->email,
            ]);

        return redirect()->route('post.index');


    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
       return view('comment.edit',compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        
      

        $this->validate($request,[
            'fullName' => 'required',
            'email' => 'required',
         ]);

        Comment::findOrfail($request->comment_id)->update([
            "fullName"=>$request->fullName,
            "email"=>$request->email,
            "commentable_type"=>$request->commentable_type,
            "commentable_id"=>$request->commentable_id,
            ]);

        return redirect()->route('post.index');


    }


    public function destroy(Comment $comment)
    {
        //
    }
}
