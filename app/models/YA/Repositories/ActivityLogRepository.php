<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:26 PM
 */

namespace YA\Repositories;

use YA\ActivityLog;

class ActivityLogRepository extends AbstractRepository implements ActivityLogRepositoryInterface {

    public function all($columns = ['*']) {
        // TODO: Implement all() method.
    }

    public function paginate($perPage = 15, $columns = array('*')) {
        // TODO: Implement paginate() method.
    }

    public function create(array $attributes) {
        return ActivityLog::create($attributes);
    }

    public function find($id, $columns = array('*')) {
        // TODO: Implement find() method.
    }

    public function update($id, array $input) {
        // TODO: Implement update() method.
    }

    public function destroy($id) {
        // TODO: Implement destroy() method.
    }


} 