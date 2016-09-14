<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternshipPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('internship_preferences', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->enum('company_type',['any','startup','mnc','ngo','other'])->default('any')->nullable(); // [ANY,STARTUP,MNC,NGO,OTHER]
          $table->string('duration',10)->default(0)->nullable(); // [ANY,0-3MONTH, 3-6MONTH,6-9MONTH,9-12MONTH, 1+YEAR]
          $table->date('from_date');
          $table->date('to_date');
          $table->enum('internship_type',['any','full_time_office','full_time_home','part_time_office','part_time_home'])->default('any');// [FO,PO, WF,WP]
          $table->float('stipend_from');
          $table->float('stipend_to');
          $table->text('city')->nullable();
          $table->integer('internship_field_id')->nullable();
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
      Schema::drop('internship_preferences');
    }
}
