<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientContactsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider(new \Faker\Provider\CustomFormatters($faker));

		$types = ['Technical Contact', 'Billing Contact', 'General Contact', 'Other'];

		foreach (\YA\Client::all() as $client) {
			if (rand(0, 1)) {

				foreach (range(1, 3) as $index) {

					$first_name = $faker->firstName;
					$last_name = $faker->lastName;

					$contact = \YA\ClientContact::create([
						'name' => $first_name . ' ' . $last_name,
						'email' => rand(0, 1) ? null : $first_name . '.' . $last_name . '@' . $faker->safeEmailDomain,
						'phone' => $faker->phoneNumber,
						'type' => $types[rand(0,3)],
						'primary' => rand(0,1)
					]);

					$client->contacts()->save($contact);
				}
			}
		}
	}

}