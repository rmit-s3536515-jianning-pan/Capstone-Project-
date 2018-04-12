<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
             $table->integer('sub_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sub_id')->references('id')->on('sub_categories');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_subs');
    }
}
