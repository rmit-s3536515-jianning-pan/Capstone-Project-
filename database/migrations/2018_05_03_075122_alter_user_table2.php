<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasColumn('users','dob')){
            $table->date('dob')->nullable();
        }
        if(!Schema::hasColumn('users','gender')){
             $table->string('gender')->nullable();
        }
        if(!Schema::hasColumn('users','address')){
           $table->string('address')->nullable();
        }
        if(!Schema::hasColumn('users','bio')){
            $table->string('bio')->nullable();
        }
        if(!Schema::hasColumn('users','userPic')){
            $table->binary('userPic')->nullable(); //to hold/store a picture (blob)
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
