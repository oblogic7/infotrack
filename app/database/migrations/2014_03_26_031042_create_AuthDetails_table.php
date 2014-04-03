<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_details', function(Blueprint $table) {
			$table->increments('id');
			$table->string('description');
			$table->string('username');
			$table->string('password');
			$table->string('url');
			$table->longText('notes');
			$table->integer('service_id')->nullable();
			$table->integer('client_id')->nullable();
			$table->integer('software_download_id')->nullable();
			$table->integer('auth_detail_types_id')->nullable();
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
		Schema::drop('auth_details');
	}

}
