<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }
}
