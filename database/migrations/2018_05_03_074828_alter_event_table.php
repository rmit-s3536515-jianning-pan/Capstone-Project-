<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         if(!Schema::hasColumn('events','owner_id'))
        {       
                 Schema::table('events',function($table){
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
