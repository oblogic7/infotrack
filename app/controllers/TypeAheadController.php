<?php

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/28/14
 * Time: 11:55 AM
 */
class TypeAheadController extends BaseController {

    public function __construct(\YA\Contracts\ClientRepositoryInterface $clients) {
        $this->clients = $clients;
    }

    public function clients() {

        $clients = $this->clients->all(['name', 'id']);

        foreach($clients as &$client) {
            $client->url = \URL::route('clients.show', $client->id);
        }

        return $clients;
    }
} 