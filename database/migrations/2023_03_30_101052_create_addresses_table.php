<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('city_id')->unsigned();
			$table->integer('district_id')->unsigned();
			$table->string('street');
			$table->string('building')->nullable();
			$table->string('floor')->nullable();
			$table->string('apartment')->nullable();
			$table->string('phone')->nullable();
			$table->string('lat')->nullable();
			$table->string('long')->nullable();
			$table->tinyInteger('status')->default('1');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('addresses');
	}
}