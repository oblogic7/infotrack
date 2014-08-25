<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\CustomFormatters($faker));
        $cms = ['PyroCMS', 'ExpressionEngine', 'Joomla', 'Drupal', 'Wordpress'];

        foreach (range(1, Config::get('database.seed.clients')) as $index) {

            $client = YA\Client::create(
                [
                    'name' => $faker->company
                ]
            );

            // create between 0 and 2 credentials for each client.
            foreach (range(0, rand(0, 2)) as $i) {

                $password = $faker->bothify('??????????##');
                $credentials = \YA\Authentication\AuthDetail::create(
                    [
                        'name' => $faker->serviceDescription(rand(1, 4)),
                        'username' => $faker->userName(),
                        'password' => $password,
                        'url' => $faker->url(),
                        'notes' => rand(0, 1) ? $faker->paragraph() : ''
                    ]
                );

                $client->credentials()->save($credentials);

            }
            foreach (range(0, rand(0, 3)) as $i) {
                $domain = $faker->domainName;

                $service = \YA\Services\Hosting\DomainService::create(
                    [
                        'label' => $domain,
                        'provider' => $domain,
                    ]
                );

                $client->services()->save($service);

                if (rand(0, 1)) {

                    $service = \YA\Services\Hosting\HostingService::create(
                        [
                            'label' => $domain,
                            'url' => $domain,
                            'cms' => $cms[rand(0,4)],
                            'launch_date' => $faker->dateTimeBetween('-10years', 'now')
                        ]
                    );

                    $client->services()->save($service);

                }

                if ($faker->boolean(30)) {

                    $service = \YA\Services\Hosting\SEOService::create(
                        [
                            'label' => $domain
                        ]
                    );

                    $client->services()->save($service);

                }
                if ($faker->boolean(10)) {

                    $service = \YA\Services\Hosting\SSLCertificateService::create(
                        [
                            'label' => $domain,
                            'expires' => $faker->dateTimeBetween('now', '+5years')

                        ]
                    );

                    $client->services()->save($service);

                }
            }


        }
    }

}