<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('experiences', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->enum('experience_type',['internship','job','project','freelance','training','other'])
          ->nullable();
        $table->string('company_name')->nullable();
        $table->integer('internship_field_id')->unsigned();
        $table->enum('work_type',['any','full_time_office','part_time_office','full_time_home','part_time_home'])->default('any');
        $table->date('work_from')->nullable();
        $table->date('work_to')->nullable();
        $table->boolean('stipend')->default(true);
        $table->float('salary')->nullable();
        $table->text('job_description')->nullable();
        $table->string('location')->nullable();
        $table->string('organization')->nullable();
        $table->string('link')->nullable();
        $table->boolean('certificate')->default(false);
        $table->float('mark')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')
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
      Schema::drop('experiences');
    }
}
