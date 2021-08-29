<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
      $allCategry=Category::all();
     // $allProduct=Product::all();
      $pageProduct=Product::paginate(5);
      return view('product.index',compact('allCategry','pageProduct'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        
        $file=$request->file('image');
        $nameimage=""; 
        if(!empty($file)){
             $nameimage=time().".".$file->getClientOriginalExtension();
             $file->move('images/products',$nameimage);
        }
 
        Product::create([
           "name"=>$request->name,
           "price"=>$request->price,
           "image"=>$nameimage,
           "category_id"=>$request->category_id,
        ]);
        
       return redirect()->route('product.index');

    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
      
       $allCategry=Category::all();
       $product=Product::findorfail($product->id);
       return view('product.edit',compact('product','allCategry'));
    }


    public function update(Request $request, Product $product)
    {
        $product=Product::findOrfail($product->id);

        $file=$request->file('image');
        $nameimage="";
      

        if(!empty($file)){
            unlink('images/products/'.$product->image);
            $nameimage=time().".".$file->getClientOriginalExtension();     
            $file->move('images/products',$nameimage);
        } else{
            $nameimage=$product->image;
        }
        Product::where('id',$product->id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$nameimage,
            'category_id'=>$request->category_id,          
        ]);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $image= Product::findorfail($product->id)->image;

        unlink('images/products/'.$image);

        Product::destroy($product->id);
        return back();
    }
}
