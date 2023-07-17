<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{

	public function up()
	{
		Schema::create('payment_methods', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('payment_methods');
	}
}
