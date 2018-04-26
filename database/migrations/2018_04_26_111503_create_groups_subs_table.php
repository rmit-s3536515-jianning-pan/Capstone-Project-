<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('groups_subs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('group_id')->unsigned();
          $table->integer('sub_id')->unsigned();
          $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::drop('groups_subs');
    }
}
