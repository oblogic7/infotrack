<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 4/28/14
 * Time: 8:57 AM
 */

namespace YA\Contracts;


interface ClientRepositoryInterface extends BaseRepositoryInterface {

    public function withAllData($client_id);

    public function attachService($client_id, $service);
    public function attachContact($client_id, $contact);
    public function attachActivity($client_id, $activity);

}