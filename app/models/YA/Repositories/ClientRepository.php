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

class ClientRepository implements ClientRepositoryInterface {

    public function all(array $includes) {
        $query = Client::orderBy('name', 'asc');

        if ($includes) {
            $query->with($includes);
        }

        return $query->get();
    }

    public function findById($id) {
        return Client::findOrFail($id);
    }

} 