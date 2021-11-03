<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function create_or_update_order_item(Request $request){
        $order = Order::firstOrCreate([
            'is_active'=> true,
            'user_id'=> $request->user()->id
        ]);
        $product = Product::find($request->product_id);
        $orderItem = OrderItem::updateOrCreate([
            'order_id'=>$order->id,
            'product_id'=>$product->id
        ],[
            'quantity'=>$request->quantity,
            'price'=> $product->pvp,
            'total'=> $product->pvp * $request->quantity,
        ]);
        return back()->with('success',"El producto \"$product->name\" fue agregado al carrito.");
    }

    public function destroy_order_item(OrderItem $orderItem)
    {
        $orderItem->delete();
        return back()->with('success',"El producto \"{$orderItem->product->name}\" fue eliminado del carrito.");
    }

    public function confirm_order(Request $request)
    {
        $order = Order::where('is_active',true)
        ->where('user_id', $request->user()->id)
        ->first();
        if(!$order){
            return back()->with('message','No ha seleccionado nada para el carrito');
        }
        $order->is_active = false;
        $order->status = 'CONFIRM';
        $order->save();
        return back()->with('success','La orden fue confirmada con éxito.');
    }

    public function cancel_order(Request $request)
    {
        $order = Order::where('is_active',true)
        ->where('user_id', $request->user()->id)
        ->first();
        if(!$order){
            return back()->with('message','No ha seleccionado nada para el carrito');
        }
        $order->is_active = false;
        $order->status = 'CANCEL';
        $order->save();
        return back()->with('success','La orden fue cancelada con éxito.');
    }
}
