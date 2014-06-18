<?php

class ClientAuthDetailsController extends \BaseController {

    public function __construct(
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Contracts\ClientAuthRepositoryInterface $auth,
        \YA\Contracts\RoleRepositoryInterface $roles
    ) {
        $this->clients = $clients;
        $this->auth = $auth;
        $this->roles = $roles;
    }


	public function create($client_id)
	{
        $client = $this->clients->find($client_id);
        $roles = $this->roles->all();

		return View::make('clients.auth.create')->with(['client' => $client, 'roles' => $roles]);
	}

	/**
	 * Store a newly created service in storage.
	 *
	 * @return Response
	 */
	public function store($client_id)
	{
        $input = Input::all();

        $client = $this->clients->find($client_id);

        // Validate that password fields match before creating entity.
        if (Input::get('password') != Input::get('password_confirm')) {
            throw new \Dryval\ValidationException('Password fields must match.');
        }

		$auth = $this->auth->create($input);

        // if roles are specified, set them here.
        if ($input['roles']) {

            foreach($input['roles'] as $role) {
                $auth->roles()->attach($role);
            }
        }


        $this->clients->attachCredentials($client_id, $auth);

        return Redirect::route('clients.show', $client->id);
	}

	/**
	 * Display the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($client_id, $auth_id)
	{
		$auth = $this->auth->find($auth_id);

        $activity_data = [
            'activity' => $auth->activity,
            'formRoute' => URL::route('auth.activity.store', [$auth->id])
        ];

		return View::make('auth.show')
            ->with(['auth' => $auth])
            ->nest('activityLogView', '_partials.activitylog', $activity_data);
	}

	/**
	 * Show the form for editing the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$auth = YA\Services\BaseService::find($id);

		return View::make('auth.edit', compact('service'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$auth = YA\Services\BaseService::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Service::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$auth->update($data);

		return Redirect::route('auth.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		YA\auth\BaseService::destroy($id);

		return Redirect::route('auth.index');
	}

}