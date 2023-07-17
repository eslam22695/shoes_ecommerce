<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{

	public function up()
	{
		Schema::create('coupons', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('code');
			$table->integer('value');
			$table->tinyInteger('type')->default('1');
			$table->integer('uses');
			$table->date('valid_from');
			$table->date('valid_to');
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('coupons');
	}
}
