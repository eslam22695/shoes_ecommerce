<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRatesTable extends Migration {

	public function up()
	{
		Schema::create('product_rates', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('rate');
			$table->string('comment');
			$table->integer('product_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('product_rates');
	}
}