<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/8/14
 * Time: 10:58 AM
 */

namespace YA\Observers;


class BaseObserver {

    public function deleting($entity) {

        // Delete activity log entries relating to this entity.
        foreach ($entity->activity as $activity) {
            $activity->delete();
        }
    }
} 