<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SoftwareTitlesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider(new \Faker\Provider\CustomFormatters($faker));

		$titles = ['Microsoft Office 2010', 'Microsoft Office 2007', 'Windows XP', 'Adobe Photoshop CS5', 'Adobe Photoshop CS6'];

		// Create software titles.

		foreach ($titles as $title) {
			$software = \YA\Assets\Software\SoftwareTitle::create(
				['name' => $title]
			);

			// Create licenses.

			foreach (range(1, Config::get('database.seed.softwarelicenses')) as $index) {

				$license = \YA\Assets\Software\SoftwareLicense::create([
					'serial'    => $faker->uuid,
					'available' => $faker->boolean(20),
					'os'        => rand(0, 1) ? 'Windows' : 'Mac'
				]);

				$software->licenses()->save($license);


				// Create license seats.

				foreach (range(0, rand(1, 2)) as $index) {

					$license_seat = \YA\Assets\Software\SoftwareLicenseSeat::create([
						'available' => $faker->boolean(20),
						'user_id'   => NULL,
					]);

					$license->seats()->save($license_seat);

				}

				// Generate software downloads.

				if (rand(0, 1)) {

					$download = \YA\Assets\Software\SoftwareDownload::create([
							'url' => $faker->url()]
					);

					$software->downloads()->save($download);

					$credentials = \YA\Authentication\AuthDetail::create([
						'name' => $faker->serviceDescription(rand(1,4)),
						'username' => 'poo',
						'password' => $faker->bothify('??????????##'),
						'url' => $faker->url(),
						'notes' => rand(0,1) ? $faker->paragraph() : ''
					]);

					$download->credentials()->save($credentials);

				}

			}
		}
	}

}