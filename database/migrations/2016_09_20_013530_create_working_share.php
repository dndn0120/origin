<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingShare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('workshare', function(Blueprint $table){
           $table->increments('No');
           $table->string('subject');
           $table->string('content');
           $table->string('file_name');
           $table->string('user_name');
           $table->string('user_id');
           $table->string('share_id');
           $table->string('important_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('workshare');
    }
}
