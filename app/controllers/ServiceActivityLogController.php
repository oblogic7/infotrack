<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/9/14
 * Time: 4:05 PM
 */

class ServiceActivityLogController extends BaseController {

    public function __construct(
        \YA\Contracts\ActivityLogRepositoryInterface $activityLog,
        \YA\Contracts\ServiceRepositoryInterface $services
    ) {
        $this->activityLog = $activityLog;
        $this->services = $services;
    }
    /**
     * @param $client_id
     * @return mixed
     */
    public function store($service_id) {

        $input = Input::all();

        // Fetch related entities.
        $service = $this->services->find($service_id);
        $user = Auth::user();

        // create activity log entry with passed relations.
        $this->activityLog->create($input, 'user', [ $user, $service ] );

        return Redirect::route('clients.services.show', [$service->client->id, $service_id]);
    }

} 