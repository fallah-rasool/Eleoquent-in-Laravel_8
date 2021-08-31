<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
     // return Post::findOrfail(1)->image;
     // return Post::with('image')->get();

     /**
      * get post for image 1
      */ 
      /**
       * برای فرداخوانی داده از سمت جدول عکس ها باید  نام تابعی که در مدل عکس  در نظر گرفته ایم را صدا کنیم 
       */
    // return Image::findOrfail(1)->image_poly;

     return Image::findOrfail(1)->imagePoly;
     
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
