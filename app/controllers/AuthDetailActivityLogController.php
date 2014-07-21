<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/9/14
 * Time: 4:05 PM
 */

class AuthDetailActivityLogController extends BaseController {

    public function __construct(
        \YA\Contracts\ActivityLogRepositoryInterface $activityLog,
        \YA\Contracts\ClientAuthRepositoryInterface $auth
    ) {
        $this->activityLog = $activityLog;
        $this->auth = $auth;
    }
    /**
     * @param $client_id
     * @return mixed
     */
    public function store($auth_id) {

        $input = Input::all();

        // Fetch related entities.
        $auth = $this->auth->find($auth_id);
        $user = Auth::user();

        // create activity log entry with passed relations.
        $this->activityLog->create($input, 'user', [ $user, $auth ] );

        return Redirect::back();
    }

} 