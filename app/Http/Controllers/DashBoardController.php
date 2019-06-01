<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders;
        $orders = Order::all();
        foreach ($orders as $key => $value) {
            $total = 0;
            $value->product_name = $value->products[0]->name;
            foreach ($value->products as $prod) {
                $total = $total +  ($prod->price * $prod->pivot->quantity);
            }

            $value->total = $total;
        }

        return view("dashboard", ["orders" => $orders]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductKind  $productKind
     * @return \Illuminate\Http\Response
     */
    public function show(ProductKind $productKind)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductKind  $productKind
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductKind $productKind)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductKind  $productKind
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductKind $productKind)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductKind  $productKind
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductKind $productKind)
    {
        //
    }
}
