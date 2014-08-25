<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityLogTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(
            'activity_log',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('message');
                $table->string('message_type');
                $table->integer('client_id')->nullable();
                $table->integer('client_contact_id')->nullable();
                $table->integer('service_id')->nullable();
                $table->integer('auth_detail_id')->nullable();
                $table->integer('software_license_id')->nullable();
                $table->integer('software_license_seat_id')->nullable();
                $table->integer('computer_id')->nullable();
                $table->integer('user_id');
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
        Schema::drop('activity_log');
    }

}
