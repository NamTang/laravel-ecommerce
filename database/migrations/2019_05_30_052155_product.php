<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->integer('quantity');
          $table->integer('price');
          $table->longText('description');
          $table->string('picture');
          $table->longText('shortDescription')->nullable();
          $table->bigInteger('catId')->unsigned();
          $table->foreign('catId') -> references('id') -> on ('product_kind');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('product');
    }
}
