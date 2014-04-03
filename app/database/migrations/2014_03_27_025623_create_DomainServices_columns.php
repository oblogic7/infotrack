<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainServicesColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services', function(Blueprint $table) {
			$table->string('url');
			$table->string('provider');
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
			$table->dropColumn('url', 'provider');
		});
	}

}
