<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view("list_product");
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view("add_product");
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
