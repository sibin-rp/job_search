<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('qualification_types', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->enum('qualification',['10_th','12_th',
              'graduation','post_graduation','diploma','phd']);
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
        Schema::drop('qualification_types');
    }
}
