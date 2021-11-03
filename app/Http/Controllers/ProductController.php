<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('product/index',[
            'products'=>Product::where('name','LIKE',"%$request->q%")->paginate(10)
        ]);
    }

    public function create()
    {
        return view('product/create',[
            'categories' => Category::all()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        $product = Product::create($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->image = "storage/".$request->file('image')->store('products','public');
        }
        $product->save();
        return redirect()->route('product.index')->with('flash.banner',__("The product :name was saved successfully.",['name'=>"\"$product->name\""]));
    }

    public function edit(Product $product)
    {
        return view('product/edit', compact('product') + ['categories' => Category::all()]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if(Storage::exists($product->image)){
                Storage::delete([$product->image]);
            }
            $product->image = "storage/".$request->file('image')->store('products','public');
            $product->save();
        }
        return redirect()->route('product.index')->with('flash.banner',__("The product :name was updated successfully.",['name'=>"\"$product->name\""]));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        if(Storage::exists($product->image)){
            Storage::delete([$product->image]);
        }
        return back()->with('flash.banner',__("The product :name was removed successfully.",['name'=>"\"$product->name\""]));
    }
}
