<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipPreferenceSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('internship_preference_skill', function(Blueprint $table){
        $table->increments('id');
        $table->integer('internship_preference_id')->unsigned();
        $table->integer('skill_id')->unsigned();
        $table->enum('expertise',['beginner','intermediate','expert'])->default('beginner');

//        $table->foreign('internship_preference_id')->references('id')
//          ->on('internship_preferences')->onDelete('cascade');
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
      Schema::drop('internship_preference_skill');
    }
}
