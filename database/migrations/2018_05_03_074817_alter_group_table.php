<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasColumn('groups','owner_id'))
        {
             Schema::table('groups',function($table){
                $table->integer('owner_id')->unsigned()->nullable();

                $table->foreign('owner_id')->references('id')->on('users');
            });
         }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
