<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('categories', function (Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('product_images', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('districts', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('coupon_users', function (Blueprint $table) {
			$table->foreign('coupon_id')->references('id')->on('coupons')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('coupon_users', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->foreign('district_id')->references('id')->on('districts')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('model_id')->references('id')->on('shoe_models')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('materials')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('sole_id')->references('id')->on('soles')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->foreign('color_id')->references('id')->on('colors')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('product_sizes', function (Blueprint $table) {
			$table->foreign('size_id')->references('id')->on('sizes')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('product_sizes', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('cart_items', function (Blueprint $table) {
			$table->foreign('product_size_id')->references('id')->on('product_sizes')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('cart_items', function (Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('payment_id')->references('id')->on('payment_methods')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('address_id')->references('id')->on('addresses')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('coupon_id')->references('id')->on('coupons')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('favourites', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('favourites', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('product_rates', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('product_rates', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('cart_items', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('color_id')->references('id')->on('colors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
	}

	public function down()
	{
		Schema::table('categories', function (Blueprint $table) {
			$table->dropForeign('categories_parent_id_foreign');
		});
		Schema::table('product_images', function (Blueprint $table) {
			$table->dropForeign('product_images_product_id_foreign');
		});
		Schema::table('districts', function (Blueprint $table) {
			$table->dropForeign('districts_city_id_foreign');
		});
		Schema::table('coupon_users', function (Blueprint $table) {
			$table->dropForeign('coupon_users_coupon_id_foreign');
		});
		Schema::table('coupon_users', function (Blueprint $table) {
			$table->dropForeign('coupon_users_user_id_foreign');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->dropForeign('addresses_city_id_foreign');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->dropForeign('addresses_district_id_foreign');
		});
		Schema::table('addresses', function (Blueprint $table) {
			$table->dropForeign('addresses_user_id_foreign');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_model_id_foreign');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_material_id_foreign');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_sole_id_foreign');
		});
		Schema::table('products', function (Blueprint $table) {
			$table->dropForeign('products_color_id_foreign');
		});
		Schema::table('product_sizes', function (Blueprint $table) {
			$table->dropForeign('product_sizes_size_id_foreign');
		});
		Schema::table('product_sizes', function (Blueprint $table) {
			$table->dropForeign('product_sizes_product_id_foreign');
		});
		Schema::table('cart_items', function (Blueprint $table) {
			$table->dropForeign('cart_items_product_size_id_foreign');
		});
		Schema::table('cart_items', function (Blueprint $table) {
			$table->dropForeign('cart_items_order_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_payment_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_address_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_coupon_id_foreign');
		});
		Schema::table('orders', function (Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('favourites', function (Blueprint $table) {
			$table->dropForeign('favourites_product_id_foreign');
		});
		Schema::table('favourites', function (Blueprint $table) {
			$table->dropForeign('favourites_user_id_foreign');
		});
		Schema::table('product_rates', function (Blueprint $table) {
			$table->dropForeign('product_rates_product_id_foreign');
		});
		Schema::table('product_rates', function (Blueprint $table) {
			$table->dropForeign('product_rates_user_id_foreign');
		});
	}
}