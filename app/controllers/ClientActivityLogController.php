<?php

class ClientActivityLogController extends \BaseController {

    public function __construct(
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Contracts\ActivityLogRepositoryInterface $activityLog
    ) {
        $this->clients = $clients;
        $this->activityLog = $activityLog;
    }

    /**
     * @param $client_id
     * @return mixed
     */
    public function store($client_id) {

        $input = Input::all();

        // Fetch related entities.
        $client = $this->clients->find($client_id);
        $user = Auth::user();

        // create activity log entry with passed relations.
        $this->activityLog->create($input, 'user', [ $user, $client ] );

        return Redirect::route('clients.show', $client_id);
    }
}