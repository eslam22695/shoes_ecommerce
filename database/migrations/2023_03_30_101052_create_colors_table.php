<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration {

	public function up()
	{
		Schema::create('colors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('code')->nullable();
			$table->integer('color_id')->unsigned()->nullable();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('colors');
	}
}