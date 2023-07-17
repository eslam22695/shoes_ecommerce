<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('payment_id')->unsigned()->nullable();
			$table->integer('address_id')->unsigned();
			$table->integer('coupon_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
			$table->decimal('total');
			$table->integer('shipping');
			$table->integer('rate')->nullable();
			$table->string('comment')->nullable();
			$table->tinyInteger('status')->default('1');
			$table->string('coupon_value')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
