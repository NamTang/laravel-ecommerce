<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductKind;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Product::get();
        $cats = ProductKind::get();
        foreach ($prods as $p) {
            foreach ($cats as $c) {
                if ($p->catId == $c->id) {
                    $p->catId = $c->name;
                    break;
                }
            }
        }

        return view("list_product", ["prods" => $prods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cats = ProductKind::get();
        $prod = Product::find($request->updateId);

        return view("add_product", ["cats" => $cats, "prod" => $prod]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $id = $request->id;
        $prod = new Product;
        if ($id != null) {
            $prod = ProductKind::find($id);
        }
        $prod->name = $name;
        $prod->shortDescription = $request->shortDescription != null ? $request->shortDescription : '';
        $prod->description = $request->description;
        $prod->quantity = $request->quantity;
        $prod->price = $request->price;
        $prod->picture = $request->picture;
        $prod->catId = $request->catId;

        try {
            $prod->save();
            return redirect("/dashboard/product/create")->with(["success" => true]);
        } catch (Exception $ex) {
            return redirect("/dashboard/product/create")->with(["error" => false, "prod" => $prod]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductKind  $productKind
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $prod = Product::find($request->id);
        $cats = ProductKind::get();
        $related = Product::where('catId', '=', $prod->catId)->get()->take(4);
        $cat = ProductKind::find($prod->catId);
        foreach ($related as $p) {
            foreach ($cats as $c) {
                if ($p->catId == $c->id) {
                    $p->catId = $c->name;
                    break;
                }
            }
        }

        return view("product", ["prod" => $prod, "cats" => $cats, "related" => $related, "cat" => $cat]);
    }

    public function showList()
    {
        $cats = ProductKind::get();
        $prods;
        if (!empty($cats)) {
            $prods = Product::where('catId', '=', ProductKind::first()->id)->paginate(20);
        }
        return view("store", ["prods" => $prods, "cats" => $cats]);
    }

    public function showListByCategoryId($id)
    {
        $cats = ProductKind::get();
        $prods = Product::where('catId', '=', $id)->paginate(20);
        return view("store", ["prods" => $prods, "cats" => $cats]);
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
    public function destroy(Request $request)
    {
        try {
            $prod = Product::find($request->id)->delete();

            return redirect("/dashboard/product")->with(["success" => true]);
        } catch (\Exception $ex) {
            return redirect("/dashboard/product")->with(["error" => false]);
        }
    }
}
