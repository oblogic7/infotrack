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

    public function find($id, $columns = array()) {
       return AuthDetail::where('id', $id)->whereNull('client_id')->with('forClients')->firstOrFail();
    }

    public function all($columns = array()) {

        $auth = AuthDetail::where('client_id', null)->with('forClients')->get();

        // Setup token data for each item
        foreach($auth as &$a) {
            $a->token = $a->name . ' ';

            foreach($a->forClients as $client) {
                $a->token .= $client->name . ' ';
            }
        }

        return $auth;
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