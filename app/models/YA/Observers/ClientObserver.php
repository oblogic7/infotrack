<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/11/14
 * Time: 2:55 PM
 */

namespace YA\Observers;

use YA\Contracts\ActivityLogRepositoryInterface;
use YA\Repositories\ActivityLogRepository;

class ClientObserver extends BaseObserver {

    public function __construct() {
        $this->activityLog = new ActivityLogRepository();
        $this->user = \Auth::user();

    }

    public function created($client) {

       $this->activityLog->create(
            [
                'message' => $client->name . ' created.',
                'message_type' => 'system',
                'client_id' => $client->id,
                'user_id' => $this->user->id
            ]);
    }

    public function deleting($client) {

        parent::deleting($client);

        foreach ($client->credentials as $credential) {
            $credential->delete();
        }

        foreach ($client->services as $service) {
            $service->delete();
        }

        foreach ($client->contacts as $contact) {
            $contact->delete();
        }

    }
} 