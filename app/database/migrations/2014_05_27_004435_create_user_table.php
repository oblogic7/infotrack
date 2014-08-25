<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('given_name');
                $table->string('family_name');
                $table->string('nickname');
                $table->string('email')->unique();
                $table->string('profile_image');
                $table->string('remember_token');
                $table->unsignedInteger('role_id');
                $table->timestamps();
            }
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
