<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponUsersTable extends Migration {

	public function up()
	{
		Schema::create('coupon_users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('coupon_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->tinyInteger('status')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('coupon_users');
	}
}