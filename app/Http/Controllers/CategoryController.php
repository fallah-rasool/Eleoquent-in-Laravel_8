<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function index()
    {
        $allCategory=Category::all();

        return view('category.index',compact('allCategory'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      //  dd($request->all());
        $this->validate($request,[
            'title' => 'required|string',
         ]);
         Category::create([
             'title'=>$request->title,
         ]);
         return Redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        
        Category::where('id',$category->id)->update([
            'title'=>$request->title,
         
        ]);
        return redirect()->route('category.index');

    }


    public function destroy(Category $category)
    {
        foreach($category->product as $product){
           $image= $product->image; 

           if(file_exists('images/products/'.$image)){
                unlink('images/products/'.$image);
           }   
              
        }
       Category::destroy($category->id);

       return back();
    }
}
