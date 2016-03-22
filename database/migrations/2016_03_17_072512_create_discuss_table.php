<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discuss',function(Blueprint $table){
            $table->increments("dis_id");
            $table->integer("post_id");
            $table->string("userName");
            $table->string("dis_cont");
            $table->timestamps();
            $table->timestamp("dis_date")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discuss');
    }
}
