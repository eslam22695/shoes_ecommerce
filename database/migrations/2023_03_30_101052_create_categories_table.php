<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('image')->nullable();
            $table->tinyInteger('order')->default('1');
            $table->Integer('parent_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default('1');
        });
    }

    public function down()
    {
        Schema::drop('categories');
    }
}