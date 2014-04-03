<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHostingServicesColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services', function(Blueprint $table) {
			$table->string('cms');
			$table->boolean('database');
			$table->date('launch_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('services', function($table) {
			$table->dropColumn('cms', 'database', 'launch_date');
		});
	}

}
