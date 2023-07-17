<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration {

	public function up()
	{
		Schema::create('product_images', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('image');
			$table->integer('product_id')->unsigned();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('product_images');
	}
}