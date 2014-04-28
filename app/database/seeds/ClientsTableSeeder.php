<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider(new \Faker\Provider\CustomFormatters($faker));

		foreach (range(1, Config::get('database.seed.clients')) as $index) {

			$client = YA\Client::create([
				'name' => $faker->company
			]);

			// create between 0 and 2 credentials for each client.
			foreach (range(0, rand(0, 2)) as $i) {

				$credentials = \YA\Authentication\AuthDetail::create([
					'description' => $faker->serviceDescription(rand(1,4)),
					'username' => $faker->userName(),
					'password' => $faker->bothify('??????????##'),
					'url' => $faker->url(),
					'notes' => rand(0,1) ? $faker->paragraph() : ''
				]);

				$client->credentials()->save($credentials);

			}

			foreach(range(0, rand(0, 3)) as $i) {
				$domain = $faker->domainName;

				$service = \YA\Services\Hosting\DomainService::create([
					'name' => $domain,
					'url' => $domain,
				]);

				$client->services()->save($service);

			}

		}
	}

}