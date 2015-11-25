<?php

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
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('oib')->nullable();
            $table->string('faculty')->nullable();
            $table->string('course')->nullable();
            $table->integer('year')->nullable();
            $table->string('email')->nullable();
            $table->boolean('active');
            $table->string('profile_picture')->nullable();
            $table->boolean('inserted_by_admin')->default(0);
            $table->string('remember_token')->nullable();
            $table->boolean('admin')->default(0);
            $table->boolean('master_admin')->default(0);
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
