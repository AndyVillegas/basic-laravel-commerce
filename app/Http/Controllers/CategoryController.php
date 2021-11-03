<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        return view('category/index', [
            'categories'=>Category::where('name','LIKE',"%$request->q%")->get()
        ]);
    }

    public function create()
    {
        return view('category/create');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->image = "storage/".$request->file('image')->store('categories','public');
        }
        $category->save();
        return redirect()->route('category.index')->with('flash.banner',"La categoría \"$category->name\" fue guardada con éxito.");
    }

    public function edit(Category $category)
    {
        return view('category/edit',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if(Storage::disk('public')->exists($category->image)){
                Storage::disk('public')->delete([$category->image]);
            }
            $category->image = "storage/".$request->file('image')->store('categories','public');
            $category->save();
        }
        return redirect()->route('category.index')->with('flash.banner',"La categoría \"$category->name\" fue actualizada con éxito.");
    }

    public function destroy(Category $category)
    {
        $category->loadCount('products');
        if($category->products_count > 0){
            return back()->withErrors(["No se puede eliminar la categoría \"$category->name\" porque tiene productos relacionados."]);
        }
        $category->delete();
        if(Storage::disk('public')->exists($category->image)){
            Storage::disk('public')->delete([$category->image]);
        }
        return back()->with('flash.banner',"La categoría \"$category->name\" fue eliminada con éxito.");
    }
}
