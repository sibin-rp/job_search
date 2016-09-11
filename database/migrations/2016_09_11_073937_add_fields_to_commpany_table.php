<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCommpanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('companies', function(Blueprint $table){
        $table->text('logo')->nullable();
        $table->string('linkedin_id');
        $table->enum('organization_type',['start_up','non_profit','mnc','ngo','other'])->default('other');
        $table->string('city');
        $table->string('state');
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
      Schema::table('companies', function(Blueprint $table){
        $table->dropColumn(['state','city','organization_type','linkedin_id','logo']);
      });
    }
}
