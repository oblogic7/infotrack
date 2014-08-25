<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(
            'services',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('service_class')->index();
                $table->string('label');
                $table->boolean('billable')->default(false);
                $table->integer('client_id')->nullable();
                $table->string('type');
                $table->string('domain');
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
        Schema::drop('services');
    }

}
