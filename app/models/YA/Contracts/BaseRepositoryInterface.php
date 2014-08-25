<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 5:47 PM
 */

namespace YA\Contracts;


interface BaseRepositoryInterface {

    public function create(array $attributes);

    public function all($columns = array('*'));

    public function find($id, $columns = array('*'));

    public function destroy($ids);

} 