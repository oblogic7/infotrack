<?php

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/28/14
 * Time: 11:55 AM
 */
class TypeAheadController extends BaseController {

    public function __construct(
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Repositories\ClientAuthRepository $auth
    ) {
        $this->clients = $clients;
        $this->auth = $auth;
    }

    public function clients() {

        $clients = $this->clients->all(['name', 'id']);

        foreach ($clients as &$client) {
            $client->ta_url = \URL::route('clients.show', $client->id);
        }

        return $clients;
    }

    public function auth() {
        $credentials = $this->auth->typeahead();

        foreach ($credentials as &$credential) {
            $credential->ta_url = \URL::route('clients.auth.show', [$credential->client->id, $credential->id]);
        }

        return $credentials;
    }
} 