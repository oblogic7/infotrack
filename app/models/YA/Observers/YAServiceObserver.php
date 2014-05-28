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
                'message' => 'Created ' . $service->type . ' (' . $service->label . ')',
                'message_type' => 'system',
                'service_id' => $service->id,
                'user_id' => $this->user->id

            ]
        );
    }
} 