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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('name',50);
            $table->text('email');
            $table->text('username');
            $table->text('password');
            $table->text('tel');
            $table->text('img_url');
            $table->text('address');
            $table->text('city');
            $table->timestamp('birth');
            $table->boolean('is_admin')->default('0');
            $table->rememberToken(); 
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
