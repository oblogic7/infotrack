<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:26 PM
 */

namespace YA\Repositories;

use YA\ActivityLog;
use YA\Contracts\ActivityLogRepositoryInterface;

class ActivityLogRepository extends AbstractRepository implements ActivityLogRepositoryInterface {

    protected $modelClassName = '\YA\ActivityLog';

    public function createUserActivity($input) {

        $activity = new ActivityLog();

        $activity->fill($input);
        $activity->message_type = 'User';
        $activity->save();

        return $activity;
    }

} 