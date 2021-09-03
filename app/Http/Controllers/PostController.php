<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {


       // return Post::findOrfail(1);
       // return Post::findOrfail(1)->comments;


       //create

        // return Post::findOrfail(15)->comments()->create([
        //     'fullName'=>"ali",
        //     'email'=>"ali@gmail.com",
        // ]);
  
        // return Product::findOrfail(1)->comments()->create([
        //     'fullName'=>"azar",
        //     'email'=>"azar@gmail.com",
        // ]);



        //  از جدول کامنت تمام کامنتهای مربوط به جدول پست ها را نمایش می دهد
       
        // return Post::findOrfail(1)->comments()->where('commentable_type','App\Models\Post')->get();

        /** or  */
       
        //تمام سطر های جدول پست به همراه کامت های مربوط به انها را برمی گرداند
      //  return Post::with('comments')->get();



        //update 

        //   return Post::findOrfail(1)->comments()

        //         ->where('commentable_type','App\Models\Post')
                
        //         ->where('commentable_id',1)

        //         ->update([

        //             "fullName"=>"amir",

        //             "email"=>"amer@gmail.com",
        //         ]);


        //delete 

        //   return Post::findOrfail(1)->comments()
        //   ->where('commentable_type','App\Models\Post')
        //   ->where('commentable_id',1)
        //   ->delete();


       $allPost=Post::with('comments')->get();

       return view('post.index',compact('allPost'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string',
            // 'fullName' => 'required',
            // 'email' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
         ]);

        $file=$request->file('image');
      
        $nameimage=""; 
        if(!empty($file)){
             $nameimage=time().".".$file->getClientOriginalExtension();
             $file->move('images/posts',$nameimage);
        }
       
        Post::create([
           "title" => $request->title,
           "image" => $nameimage,
           "description" => $request->description,          
        ]);



        return redirect()->route('post.index');
    }


    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }


    public function edit(Post $post)
    {      
       $post=Post::findorfail($post->id);
       return view('post.edit',compact('post'));

    }


    public function update(Request $request, Post $post)
    {
       
        $post=Post::findOrfail($post->id);

        $file=$request->file('image');
        $nameimage="";

        if(!empty($file)){
            unlink('images/posts/'.$post->image);
            $nameimage=time().".".$file->getClientOriginalExtension();     
            $file->move('images/posts',$nameimage);
        } else{
            $nameimage=$post->image;
        }
        Post::where('id',$post->id)->update(
            [
                'title'=>$request->	title,
                'image'=>$nameimage,
                'description'=>$request->description,
            ]
        );


        // Post::findOrfail($post->id)->comments()
        //     ->where('commentable_id',$post->id)->update(
        //         [
        //             "fullName"=>$request->fullName,
        //             "email"=>$request->email,
        //         ]);

        return redirect()->route('post.index');
    }


    public function destroy(Post $post)
    {
        // $image=  Post::find($post->id)->image;

        // unlink('images/posts/'.$image);

        // Post::find($post->id)->comments()->delete(); 
        
        // Post::destroy($post->id);

        /** */

        Post::findOrfail($post->id)->comments()
        ->where('commentable_type','App\Models\Post')->delete();

        Post::destroy($post->id);
 
        return back();
    }
}
