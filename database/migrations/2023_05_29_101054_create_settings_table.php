<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{

	public function up()
	{
		Schema::create('settings', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone1')->nullable();
			$table->string('phone2')->nullable();
			$table->string('email1')->nullable();
			$table->string('email2')->nullable();
			$table->string('address1')->nullable();
			$table->string('address2')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('instagram')->nullable();
			$table->string('youtube')->nullable();
			$table->string('whatsapp')->nullable();
			$table->string('linkedin')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
