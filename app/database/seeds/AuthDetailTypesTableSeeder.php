<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AuthDetailTypesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider(new \Faker\Provider\CustomFormatters($faker));

		$types = ['Internal', 'Client'];

		foreach($types as $type)
		{
			\YA\Authentication\AuthDetailType::create([
				'name' => $type
			]);
		}
	}

}