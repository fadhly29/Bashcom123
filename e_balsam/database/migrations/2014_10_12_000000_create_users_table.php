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
        Schema::create('usergroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('access_right');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // foreign key on usergroups
            $table->foreign     ( 'group_id' )
                  ->references  ( 'id' )
                  ->on          ( 'usergroups' )
                  ->onDelete    ( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usergroups');
        Schema::drop('users');
    }
}
