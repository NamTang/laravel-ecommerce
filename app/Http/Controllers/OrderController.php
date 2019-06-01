<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view("checkout");
    }

    public function store(Request $request)
    {
        $session_id;
        $order = new Order;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        if (empty(Auth::user())) {
            $session_id = session()->get('_token');
        } else {
            $session_id = Auth::user()->id;
            $order->user_id - $session_id;
        }
        $carts = Cart::where('session_id', '=', $session_id)->get();


        $order->save();
        foreach ($carts as $c) {
            $order->products()->attach([$c->product_id => ["quantity" => $c->qty]]);
            Cart::find($c->id)->delete();
        }

        return back();
    }
}
