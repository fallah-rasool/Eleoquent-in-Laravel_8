<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

      //  return Post::with('tags')->get();

       //  $tag=Tag::all();
       //  return Post::findOrfail(1)->tags()->sync([1,2,3,4]);
       //  return Post::findOrfail(2)->tags()->sync($tag);


      // return Tag::findOrfail(1);
      // return Tag::findOrfail(1)->posts();

    //    return Tag::findOrfail(1)->posts()
    //             ->where('taggable_type','App\Models\Post')
    //             ->where('tag_id',1)
    //             ->where('taggable_id',1)
    //             ->get();


   // return Post::orderBy('id','desc')->first();

        $posts=Post::with('tags')->get();
        $tags=Tag::all();

      // return $posts;
      
        return view('post.index',compact('posts','tags'));


    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

     // return $request->all();

        // $this->validate($request,[
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //  ]);

        Post::create([
           "title" => $request->title,
           "description" =>$request->description,          
        ]);

      
        $lastItem=Post::orderBy('id','desc')->first();

        Post::findOrfail($lastItem->id)->tags()->sync($request->tag);

        return redirect()->route('post.index');

    }


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
       $allTag=Tag::all();

       $selectTag= Post::findOrfail($post->id)->tags;


    //    foreach($post as $tag){

    //     echo $tag->pivot->tag_id.'<br>';
    //    }

   //  return $post;
       
       return view('post.edit',compact('post','selectTag','allTag'));
    }


    public function update(Request $request, Post $post)
    {
       
         Post::findOrfail($post->id)->update([

            'title'=>$request->title,
            'description'=>$request->description,

         ]);

         Post::findOrfail($post->id)->tags()->sync($request->tag);

         return redirect()->route('post.index');

    }


    public function destroy(Post $post)
    {
        Post::findOrfail($post->id)->tags()->sync([]);

        Post::destroy($post->id);

        return redirect()->route('post.index');
    }
}
