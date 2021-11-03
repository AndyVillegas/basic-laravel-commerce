<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        return view('order/index',[
            'orders'=> Order::whereRelation('user','name','like',"%$request->q%")->get()
        ]);
    }
}
