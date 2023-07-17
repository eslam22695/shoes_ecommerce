<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoeModelsTable extends Migration {

	public function up()
	{
		Schema::create('shoe_models', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('shoe_models');
	}
}