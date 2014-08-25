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

class ActivityLogRepository implements ActivityLogRepositoryInterface {

    protected $modelClassName = '\YA\ActivityLog';

    public function create($input, $type = 'system', $relations = []) {

        $activity = new ActivityLog();

        $activity->fill($input);
        $activity->message_type = $type;
        $activity->save();

        /**
         * Create relations that were passed in.
         */
        if ($relations) {
            foreach ($relations as $relative) {
                $relative->activity()->save($activity);
            }
        }

    }

} 