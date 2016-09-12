<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('qualifications', function (Blueprint $table){
        $table->increments('id');
        $table->integer('internship_id')->unsigned();
        $table->string('qualification',50);
        $table->string('degree');
        $table->string('stream');
        $table->string('mark');
        $table->timestamps();
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
      Schema::drop('qualifications');
    }
}
