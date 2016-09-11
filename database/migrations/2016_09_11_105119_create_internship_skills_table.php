<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('internship_skill', function(Blueprint $table){
        $table->increments('id');
        $table->integer('skill_id');
        $table->integer('internship_id')->unsigned();
        $table->enum('expertise_level',['beginner','intermediate','expert']);

        $table->foreign('internship_id')->references('id')->on('internships')
          ->onDelete('cascade');
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
      Schema::drop('internship_skill');
    }
}
