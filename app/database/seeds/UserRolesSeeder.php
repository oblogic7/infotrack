<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserRolesSeeder extends Seeder {

	public function run()
	{
		Role::create([
            'name' => 'Super Admin',
            'description' => 'Admin users.'
        ]);

        Role::create([
            'name' => 'Default',
            'description' => 'Regular users.'
        ]);
	}

}