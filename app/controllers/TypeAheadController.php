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

        return $this->clients->all(['name']);
    }
} 