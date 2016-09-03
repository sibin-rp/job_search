<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('information');
            $table->string('website');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->integer('user_id');
            $table->string('industry');
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
        Schema::drop('companies');
    }
}
