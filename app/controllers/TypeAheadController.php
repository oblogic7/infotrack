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
        \YA\Repositories\ClientAuthRepository $client_auth,
        \YA\Contracts\YAAuthRepositoryInterface $ya_auth
    ) {
        $this->clients = $clients;
        $this->client_auth = $client_auth;
        $this->ya_auth = $ya_auth;
    }

    public function clients() {

        $clients = $this->clients->all(['name', 'id']);

        foreach ($clients as &$client) {
            $client->ta_url = \URL::route('clients.show', $client->id);
        }

        return $clients;
    }

    public function clientAuth() {
        $credentials = $this->client_auth->typeahead();

        foreach ($credentials as &$credential) {
            $credential->ta_url = \URL::route('clients.auth.show', [$credential->client->id, $credential->id]);
        }

        return $credentials;
    }

    public function yaAuth() {
        $credentials = $this->ya_auth->typeahead();

        foreach ($credentials as &$credential) {
            $credential->ta_url = \URL::route('credentials.show', $credential->id);
        }

        return $credentials;
    }
} 