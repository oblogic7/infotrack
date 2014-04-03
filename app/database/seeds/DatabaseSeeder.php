<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('AuthDetailTypesTableSeeder');
		 $this->call('ClientsTableSeeder');
		 $this->call('ClientContactsTableSeeder');
		 $this->call('SoftwareTitlesTableSeeder');
	}

}