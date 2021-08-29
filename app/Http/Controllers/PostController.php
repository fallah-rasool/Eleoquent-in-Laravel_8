<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
       // $allPost=Post::all();
       // $allPost=Post::findOrfail(1);
       // $allPost=Post::findOrfail(1)->where('id','=',2)->get();
       // $allPost=Post::findOrfail(1)->where('id','=',2)->get('title');
       // $allPost=Post::findOrfail(1)->comment;
       // $allPost=Post::findOrfail(1)->comment()->get();
       // $allPost=Post::findOrfail(1)->comment()->get('name');
       // $allPost=Post::findOrfail(1)->with ('comment')->get();
       // $allPost=Post::findOrfail(1)->with ('comment')->where('id','>',2)->get();
        //select * from `posts` where `id` > ?

      // $allPost=Post::with ('comment')->where('id','>',2)->get();
        //select * from `posts` where `id` > ?

        $allPost=Post::with ('comment')->get();

      // return $allPost;

        return view('post.index',compact('allPost'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
     // dd($post->id);

      Post::destroy($post->id);
      return back();
    }
}
