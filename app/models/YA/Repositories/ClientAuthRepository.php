<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/19/14
 * Time: 11:08 PM
 */

namespace YA\Repositories;


use YA\Authentication\AuthDetail;
use YA\Contracts\ClientAuthRepositoryInterface;

class ClientAuthRepository extends AbstractRepository implements ClientAuthRepositoryInterface {

    protected $modelClassName = '\YA\Authentication\AuthDetail';

    public function typeahead() {
        return AuthDetail::where('client_id', null)->get();
    }

    public function create(array $input) {
        $auth = parent::create($input);

        // if roles are specified, set them here.
        if (isset($input['roles'])) {
            foreach($input['roles'] as $role) {
                $auth->roles()->attach($role);
            }
        }

        return $auth;
    }

    public function update($id, $input) {
        $auth = $this->find($id);
        $auth->fill($input);
        $auth->save();

        return $auth;
    }
}