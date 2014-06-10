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

    public function __construct(ActivityLogRepositoryInterface $activity) {
        $this->activityLog = $activity;
        $this->user = \Auth::user();

    }

    public function created($client) {

       $activityLog = $this->activityLog->create(
            [
                'message' => $client->name . ' created.',
                'message_type' => 'system',
                'client_id' => $client->id,
                'user_id' => $this->user->id
            ]);

        $this->user->activity()->save($activityLog);
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