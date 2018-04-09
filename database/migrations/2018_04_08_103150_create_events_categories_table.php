<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_categories', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('event_id')->unsigned();
            $t->foreign('event_id')->references('id')->on('events');
            $t->integer('category_id')->unsigned();
            $t->foreign('category_id')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events_categories');
    }
}
