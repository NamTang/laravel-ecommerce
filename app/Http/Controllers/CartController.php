<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cart', ["carts" => $this->show()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function add($product_id, Request $request)
    {
        // For Identification Purpose
        $session_id = empty(Auth::user()) ? session()->get('_token') : (string) Auth::user()->id;

        // Get Product Detils by ID
        $product = Product::where('id', $product_id)->first();
        if ($product == null) {
            return abort(404);
        }

        if (Cart::where('session_id', '=', $session_id)->exists()) {
          //CHeck whether product exist if yes increase quantity
            $entry = Cart::where([ 'session_id' => $session_id, 'product_id' => $product_id ])->increment('qty', empty($request->quantity) ? 1 : $request->quantity);
            if (! $entry) {
                $cart = new Cart;
                $cart->session_id   = $session_id;
                $cart->product_id   = $product_id;
                $cart->product_name = $product->name;
                $cart->price        = $product->price;
                $cart->qty          = empty($request->quantity) ? 1 : $request->quantity;
                $cart->save();
            }
        } else {
            $cart = new Cart;
            $cart->session_id   = $session_id;
            $cart->product_id   = $product_id;
            $cart->product_name = $product->name;
            $cart->price        = $product->price;
            $cart->qty          = empty($request->quantity) ? 1 : $request->quantity;
            $cart->save();
        }

        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cart $cart)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public static function show()
    {
        $session_id = empty(Auth::user()) ? session()->get('_token') : (string) Auth::user()->id;
        $carts = Cart::where('session_id', '=', $session_id)->get();
        $prods = collect();
        foreach ($carts as $value) {
            $p = Product::find($value->product_id);
            $p->quantity = $value->qty;
            $p->catId = $value->id;
            $prods->push($p);
        }

        return $prods;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      foreach ($request->cartId as $key => $id) {
          $cart = Cart::find($id);
          $cart->qty = $request->quantity[$key];
          $cart->save();
      }

      return redirect("checkout");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $carts = Cart::find($id)->delete();
      } catch (\Exception $ex) {
        return back();
      }

      return back();
    }
}
