<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('student_qualifications', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->string('college_name')->nullable();
        $table->string('type')->nullable();
        $table->string('link')->nullable();
        $table->string('title')->nullable();
        $table->string('description')->nullable();
        $table->string('completed',10)->nullable();
        $table->string('started_at',25)->nullable();
        $table->string('completed_at',25)->nullable();
        $table->enum('mark_type',['percentage','cgpa_4','cgpa_10'])->nullable();
        $table->float('mark')->nullable();
        $table->string('degree')->nullable();
        $table->string('stream')->nullable();
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
      Schema::drop('student_qualifications');
    }
}
