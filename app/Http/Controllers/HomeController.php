<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductKind;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = ProductKind::get();
        $map = collect();
        foreach($cats as $c) {
          $prods = Product::where('catId', '=', $c->id)->simplePaginate(5);
          foreach($prods as $p) {
              foreach($cats as $c) {
                  if ($p->catId == $c->id) {
                      $p->catId = $c->name;
                      break;
                  }
              }
          }
          $map->put($c->name, $prods);
        }

        return view('home', ["cats" => $cats, "map" => $map]);
    }
}
