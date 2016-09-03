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
        Schema::create('internship_preference', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->tinyInteger('company_type')->default(0)->nullable(); // [ANY,STARTUP,MNC,NGO,OTHER]
          $table->tinyInteger('duration')->default(0)->nullable(); // [ANY,0-3MONTH, 3-6MONTH,6-9MONTH,9-12MONTH, 1+YEAR]
          $table->date('from_date');
          $table->date('to_date');
          $table->tinyInteger('internship_type');// [FO,PO, WF,WP]
          $table->float('stipend_from');
          $table->float('stipend_to');
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
      Schema::drop('internship_preference');
    }
}
