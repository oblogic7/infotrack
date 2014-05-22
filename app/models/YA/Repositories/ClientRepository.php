<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 4/28/14
 * Time: 8:54 AM
 */

namespace YA\Repositories;

use YA\Client;
use YA\Contracts\ClientRepositoryInterface;

class ClientRepository extends AbstractRepository implements ClientRepositoryInterface {

    protected $modelClassName = '\YA\Client';

    public function withAllData() {

        return Client::orderBy('name', 'asc')
            ->with(array('contacts', 'credentials', 'services', 'activity'))
            ->get();

    }

    public function attachService($client_id, $service) {

        $client = Client::findOrFail($client_id);

        $client->services()->save($service);

    }

    public function attachContact($client_id, $contact) {

        $client = Client::findOrFail($client_id);

        $client->contacts()->save($contact);

    }

    public function attachCredentials($client_id, $auth) {

        $client = Client::findOrFail($client_id);

        $client->credentials()->save($auth);

    }

} 