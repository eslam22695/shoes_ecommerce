<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image');
			$table->string('price');
			$table->string('discount_price');
			$table->string('description');
			$table->integer('category_id')->unsigned();
			$table->integer('model_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->integer('sole_id')->unsigned();
			$table->integer('color_id')->unsigned();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
