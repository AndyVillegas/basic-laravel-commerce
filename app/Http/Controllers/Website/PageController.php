<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('website/home',[
            'featuredProducts'=>\App\Models\Product::all()->take(6)
        ]);
    }
    public function products(Request $request)
    {
        return view('website/products',[
            'categories'=>\App\Models\Category::all(),
            'products'=>\App\Models\Product::where('name','LIKE',"%$request->q%")
                ->where(function($query) use ($request){
                    if($request->category_id && $request->category_id != -1)
                        $query->where('category_id','=',$request->category_id);
                })
                ->paginate(9)
        ]);
    }
    public function my_cart(Request $request)
    {
        $order = \App\Models\Order::with('order_items.product')
        ->where('is_active', true)
        ->where('user_id', $request->user()->id)
        ->first();
        return view('website/my-cart', compact('order'));
    }
}
