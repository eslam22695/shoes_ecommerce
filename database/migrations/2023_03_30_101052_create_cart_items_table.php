<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{

	public function up()
	{
		Schema::create('cart_items', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_size_id')->unsigned();
			$table->integer('quantity');
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
			$table->integer('color_id')->unsigned();
			$table->integer('price');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('cart_items');
	}
}
