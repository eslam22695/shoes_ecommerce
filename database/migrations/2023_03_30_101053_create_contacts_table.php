<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->string('subject');
			$table->string('message');
			$table->string('email');
			$table->tinyInteger('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}