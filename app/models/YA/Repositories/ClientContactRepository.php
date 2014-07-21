<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/13/14
 * Time: 11:51 PM
 */

namespace YA\Repositories;


use YA\Contracts\BaseRepositoryInterface;
use YA\Contracts\ClientContactRepositoryInterface;

class ClientContactRepository extends AbstractRepository implements ClientContactRepositoryInterface {

    protected $modelClassName = '\YA\ClientContact';

    public function update($id, $input) {
        $contact = $this->find($id);

        $contact->fill($input);

        $contact->save();

        return $contact;
    }
} 