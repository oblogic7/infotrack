<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 4/28/14
 * Time: 8:57 AM
 */

namespace YA\Contracts;


interface ClientRepositoryInterface {

	public function all(array $includes);

	public function findById($id);

} 