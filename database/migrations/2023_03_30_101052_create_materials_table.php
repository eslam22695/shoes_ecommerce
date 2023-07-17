<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{

	public function up()
	{
		Schema::create('materials', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image')->nullable();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('materials');
	}
}
