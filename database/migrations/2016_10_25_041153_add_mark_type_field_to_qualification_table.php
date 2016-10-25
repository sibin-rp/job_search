<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarkTypeFieldToQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('qualifications', function(Blueprint $table){
            $table->enum('mark_type',['cgpa_4','cgpa_10','percentage'])
              ->default('cgpa_4');
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
        Schema::table('qualifications', function(Blueprint $table){
            $table->dropColumn('mark_type');
        });
    }
}
