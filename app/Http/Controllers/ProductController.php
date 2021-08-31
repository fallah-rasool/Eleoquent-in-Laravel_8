<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $allProduct=Product::all();
        return view('product.index',compact('allProduct'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
         ]);

        $file=$request->file('image');
        $nameimage=""; 
        if(!empty($file)){
             $nameimage=time().".".$file->getClientOriginalExtension();
             $file->move('images/products',$nameimage);
        }

        Product::create([
           "name"=>$request->name,
           "price"=>$request->price,
        ]);

        $lastproduct=Product::orderBy('id','desc')->first();
        
        Product::findOrfail($lastproduct->id)->image()->create([
            "image"=>$nameimage,
        ]);

        return redirect()->route('product.index');
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {      
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
       
        $oldImage=Product::findOrfail($product->id)->image->image;

       
        $file=$request->file('image');
        $nameimage="";


        if(!empty($file)){
            unlink('images/products/'.$oldImage);
            $nameimage=time().".".$file->getClientOriginalExtension();     
            $file->move('images/products',$nameimage);
        } else{
            $nameimage=$oldImage;
        }
        Product::where('id',$product->id)->update([
            'name'=>$request->name,
            'price'=>$request->price,        
        ]);

        Product::findOrfail($product->id)->image()->update([

            "image"=>$nameimage,
        ]);
        return redirect()->route('product.index');
        

    }

    public function destroy(Product $product)
    {

       $image=  Product::find($product->id)->image->image;

       Product::find($product->id)->image()->delete();

       Product::destroy($product->id);

       unlink('images/products/'.$image);

       return back();
    }
}
