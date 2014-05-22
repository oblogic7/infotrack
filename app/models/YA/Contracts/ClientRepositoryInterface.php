<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 4/28/14
 * Time: 8:57 AM
 */

namespace YA\Contracts;


interface ClientRepositoryInterface extends BaseRepositoryInterface {

    public function withAllData();

    public function attachService($client_id, $service);
    public function attachContact($client_id, $contact);

}