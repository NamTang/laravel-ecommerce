<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
