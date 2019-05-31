<?php

namespace App\Http\Controllers;

use App\ProductKind;
use Illuminate\Http\Request;

class ProductKindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = ProductKind::get();
        return view("list_category", ["cats" => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat = ProductKind::find($request -> updateId);
        return view("add_category", ['cat' => $cat]);
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
        $cat = new ProductKind;
        if ($id != null) {
          $cat = ProductKind::find($id);
        }
        $cat->name = $name;
        try {
          $cat->save();
          return redirect("/dashboard/category/create")->with(["success" => true]);
        } catch(\Exception $ex) {
          return redirect("/dashboard/category/create")->with(["error" => false, "cat" => $cat]);
        }
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
    public function destroy(Request $request)
    {
      try {
        $cat = ProductKind::find($request->id)->delete();

        return redirect("/dashboard/category")->with(["success" => true]);
      } catch (\Exception $ex) {
        return redirect("/dashboard/category")->with(["error" => false]);
      }
    }
}
