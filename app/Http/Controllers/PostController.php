<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
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

    //  return Image::findOrfail(1)->imagePoly;


    /**
     * اضافه کردن عکس برای جدول محصولات در جدول عکس ها توسط  رابطه پلی‌مورفیک یک به یک
     */

        // Product::findOrfail(2)->image()->create([
        //     "image"=>"ProducImage-2.jpg",
        // ]);

        /**
         * فرض کنید می  واهیم اصلاعات محصول جدید را به جدول محصولات اضافه کنیم اما عکس این محصول جدید باید در جدول عکس ها ذخیره شود ابتدا محصول را درج می کنیم و سپس با گرفتن شناسه اخرین محصول عکس ان را نیز  در جدول عکس ها اضافه می کنیم 
         */
        // $lastproduct=Product::orderBy('id','desc')->first();


        // Product::findOrfail($lastproduct->id)->image()->create([
        //     "image"=>"ProducImage-3.jpg",
        // ]);


        
     
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
