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
        return AuthDetail::with('client')->get();
    }
}