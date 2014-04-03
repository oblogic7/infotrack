<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoftwareLicenseSeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('software_license_seats', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('available');
			$table->integer('user_id')->nullable();
			$table->integer('software_license_id');
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
		Schema::drop('software_license_seats');
	}

}
