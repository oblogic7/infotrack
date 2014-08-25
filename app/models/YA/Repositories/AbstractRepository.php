<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/9/14
 * Time: 10:50 PM
 */

namespace YA\Repositories;


abstract class AbstractRepository {

    protected $modelClassName;

    protected $model;

    public function create(array $attributes) {
        return call_user_func_array("{$this->modelClassName}::create", array($attributes));
    }

    public function all($columns = array('*')) {
        return call_user_func_array("{$this->modelClassName}::all", array($columns));
    }

    public function find($id, $columns = array('*')) {
        return call_user_func_array("{$this->modelClassName}::find", array($id, $columns));
    }

    public function destroy($ids) {
        return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
    }

} 