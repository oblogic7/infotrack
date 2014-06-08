<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/3/14
 * Time: 8:52 PM
 */

namespace YA\Observers;

use YA\Repositories\ActivityLogRepository;

class ClientContactObserver extends BaseObserver {

    public function __construct() {
        $this->activityLog = new ActivityLogRepository();
        $this->user = \Auth::user();

    }

    public function created($contact) {
        $this->activityLog->create([
                'message' => $contact->name . ' added as a contact.',
                'message_type' => 'system',
                'client_contact_id' => $contact->id,
                'user_id' => $this->user->id

            ]);

    }

} 