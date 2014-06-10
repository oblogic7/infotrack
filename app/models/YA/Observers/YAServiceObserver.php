<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:52 PM
 */

namespace YA\Observers;

use YA\Repositories\ActivityLogRepository;

class YAServiceObserver {

    public function __construct() {
        $this->activityLog = new ActivityLogRepository();
        $this->user = \Auth::user();

    }

    public function created($service) {

        $activity = $this->activityLog->create(
            [
                'message' => $service->type . ' service created.',
                'message_type' => 'system',
                'service_id' => $service->id,
                'user_id' => $this->user->id

            ]
        );
    }

    public function deleting($service) {
        foreach ($service->activity as $activity) {

            $activity->delete();
        }
    }
} 