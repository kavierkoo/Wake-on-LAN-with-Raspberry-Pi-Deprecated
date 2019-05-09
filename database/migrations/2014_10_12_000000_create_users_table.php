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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
			$table->integer('role');
            $table->rememberToken();
            $table->timestamps();
        });

	// Insert default user 
   	 DB::table('users')->insert(
        array(
			'name' => 'test',
            'email' => 'test@test.com',
            'password' => '$2y$10$UnBwdPMMzBPcZNBEe7oekeoj50iaNVGkT.uYjJglx0e0rwOo70k4.', //password: password
			'role' => 1,
             )
         );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
