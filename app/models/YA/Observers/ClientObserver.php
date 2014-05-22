<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/11/14
 * Time: 2:55 PM
 */

namespace YA\Observers;


use YA\Repositories\ActivityLogRepository;

class ClientObserver {

    public function __construct() {
        $this->activityLog = new ActivityLogRepository();
    }

    public function created($client) {

        $this->activityLog->create(
            [
                'message' => $client->name . ' created.',
                'message_type' => 'system',
                'client_id' => $client->id
            ]
        );

    }
} 