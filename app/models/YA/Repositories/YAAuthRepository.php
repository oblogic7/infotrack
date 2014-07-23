<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/19/14
 * Time: 11:08 PM
 */

namespace YA\Repositories;


use YA\Authentication\AuthDetail;
use YA\Contracts\YAAuthRepositoryInterface;

class YAAuthRepository extends AbstractRepository implements YAAuthRepositoryInterface {

    protected $modelClassName = '\YA\Authentication\AuthDetail';

    public function all($columns = array()) {
        return AuthDetail::where('client_id', null)->get();
    }

    public function typeahead() {
        return $this->all();
    }

    public function create(array $input) {
        $auth = parent::create($input);

        // if roles are specified, set them here.
        if (isset($input['roles'])) {
            foreach($input['roles'] as $role) {
                $auth->roles()->attach($role);
            }
        }

        if (isset($input['clients'])) {
            foreach($input['clients'] as $client) {
                $auth->forClients()->attach($client);
            }
        }

        return $auth;
    }
}