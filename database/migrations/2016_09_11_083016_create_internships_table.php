<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('internships', function(Blueprint $table){
        $table->increments('id');
        $table->string('title');
        $table->text('description');
        $table->float('stipend_from')->default(0);
        $table->float('stipend_to')->default(0);
        $table->string('duration',50);
        $table->enum('type',['any','full_time_office','full_time_home','part_time_office','part_time_home'])->default('any');
        $table->integer('company_id');
        $table->integer('internship_field_id')->unsigned();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->integer('eligible_min')->nullable();
        $table->integer('eligible_max')->nullable();

        $table->integer('num_resume')->default(0);
        $table->enum('pre_rec_exercise',['none','sample_work','telephone_interview',
          'one_on_one_interview','video_interview','chat','other'])
          ->default('none');
        $table->enum('payment',['weekly','fortnightly','monthly']);
        $table->date('validity');
        $table->timestamps();

        $table->foreign('internship_field_id')->references('id')
          ->on('internship_fields');


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
      Schema::table('internships', function(Blueprint $table){
        $table->dropForeign(['internship_field_id']);
      });
      Schema::drop('internships');
    }
}
