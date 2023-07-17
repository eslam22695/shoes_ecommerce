<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration {

	public function up()
	{
		Schema::create('abouts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('description')->nullable();
			$table->text('policy')->nullable();
			$table->string('title1')->nullable();
			$table->string('value1')->nullable();
			$table->string('title2')->nullable();
			$table->string('value2')->nullable();
			$table->string('title3')->nullable();
			$table->string('value3')->nullable();
			$table->string('title4')->nullable();
			$table->string('value4')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('abouts');
	}
}