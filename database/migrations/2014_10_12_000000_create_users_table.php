<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('type')->default(0);// Not a company 
            $table->string('token')->nullable();// used to send emails
            $table->boolean('active')->default(0);
            $table->boolean('admin')->default(0);// not a admin user 
            $table->boolean('super_admin')->default(0);// not a super user
            $table->date('dob')->nullable();
            $table->boolean('sex')->nullable();// M=1, F=2
            $table->string('profile_image')->nullable();
            // Home Address
            $table->text('home_address')->nullable();
            $table->string('home_city')->nullable();
            // Live Address
            $table->text('live_address')->nullable();
            $table->string('live_city');
            // Contact
            $table->bigInteger('phone_no')->nullable();
            $table->bigInteger('alternate_contact')->nullable();
            $table->string('alternate_email')->nullable();
            // Personal
            $table->text('describe')->nullable();

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
