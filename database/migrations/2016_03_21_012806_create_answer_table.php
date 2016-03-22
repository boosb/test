<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer',function(Blueprint $table){
            $table->increments('ans_id');
            $table->integer('ans_to');
            $table->string('ans_cont');
            $table->timestamps();
            $table->timestamp("ans_date")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Scheam::drop('answer');
    }
}
