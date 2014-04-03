<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoftwareLicensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('software_licenses', function(Blueprint $table) {
			$table->increments('id');
			$table->longtext('serial');
			$table->boolean('available');
			$table->string('os');
			$table->integer('software_title_id');
			$table->integer('user_id')->nullable();
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
		Schema::drop('software_licenses');
	}

}
