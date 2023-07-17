<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolesTable extends Migration {

	public function up()
	{
		Schema::create('soles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('soles');
	}
}