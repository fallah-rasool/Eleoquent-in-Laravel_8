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

        // return Post::findOrfail(1)->comments()->create([
        //     'fullName'=>"raza",
        //     'email'=>"raza@gmail.com",
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
        //
    }
}
