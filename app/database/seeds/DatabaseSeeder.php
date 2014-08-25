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

		 $this->call('ClientsTableSeeder');
		 $this->call('ClientContactsTableSeeder');
		 $this->call('SoftwareTitlesTableSeeder');
        $this->call('UserRolesSeeder');
	}

}