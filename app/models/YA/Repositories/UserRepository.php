<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 7/22/14
 * Time: 10:32 PM
 */

namespace YA\Repositories;


use YA\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function find($id) {
        return \User::findOrFail($id);
    }

    public function all() {
        return \User::all();
    }
} 