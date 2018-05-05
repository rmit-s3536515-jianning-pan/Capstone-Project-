<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('title');
            $table->string("description",1000);
            $table->integer('max_attend');
            $table->date("start_date")->nullable();
            $table->time("start_time")->nullable();
            $table->foreign('owner_id')->references('id')->on('users');
            // $table->integer('group_id')->unsigned();
            // $table->foreign('group_id')->references('id')->on('groups');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
