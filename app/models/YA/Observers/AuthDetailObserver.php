<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:52 PM
 */

namespace YA\Observers;

use YA\Repositories\ActivityLogRepository;

class AuthDetailObserver {

    public function __construct() {
        $this->activityLog = new ActivityLogRepository();
        $this->user = \Auth::user();
    }

    public function created($auth) {
        $this->activityLog->create([
                'message' => 'Credentials added for ' . $auth->name . '.',
                'message_type' => 'system',
                'auth_detail_id' => $auth->id,
                'user_id' => $this->user->id
            ]);

    }
} 