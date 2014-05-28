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

    public function withAllData($client_id) {

        return Client::with(['contacts', 'credentials', 'services', 'activity', 'contactActivity', 'serviceActivity', 'authActivity'])
            ->where('id', $client_id)->firstOrFail();

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