<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration {

	public function up()
	{
		Schema::create('product_sizes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('size_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->default('0');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('product_sizes');
	}
}