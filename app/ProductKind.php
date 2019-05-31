<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKind extends Model
{
      protected $table = "product_kind";
      public $timestamps = false;
      public $countedProd;
}
