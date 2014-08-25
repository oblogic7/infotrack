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


    public function create($client_id) {
        $client = $this->clients->find($client_id);
        $roles = $this->roles->all();

        return View::make('clients.auth.create')->with(['client' => $client, 'roles' => $roles]);
    }

    /**
     * Store a newly created service in storage.
     *
     * @return Response
     */
    public function store($client_id) {
        $input = Input::all();

        // Validate that password fields match before creating entity.
        if ($input[ 'password' ] != $input[ 'password_confirm' ]) {
            throw new \Dryval\ValidationException('Password fields must match.');
        }

        $input[ 'client_id' ] = $client_id;

        $auth = $this->auth->create($input);

        return Redirect::route('clients.show', $client_id);
    }

    /**
     * Display the specified service.
     *
     * @param  int $id
     * @return Response
     */
    public function show($client_id, $auth_id) {
        $auth = $this->auth->find($auth_id);
        $client = $this->clients->find($client_id);

        $activity_data = [
            'activity' => $auth->activity,
            'formRoute' => URL::route('auth.activity.store', [$auth->id])
        ];

        return View::make('clients.auth.show')
            ->with(['auth' => $auth, 'client' => $client])
            ->nest('activityLogView', '_partials.activitylog', $activity_data);
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($client_id, $auth_id) {
        $auth = $this->auth->find($auth_id);
        $client = $this->clients->find($client_id);

        if ( ! Access::userAuthorized($auth->roles->lists('name')) ) {
            return Redirect::route('clients.show', $client_id)->withErrors('Quit that!  You don\'t have permission to do that!');
        }
        return View::make('clients.auth.edit')->with(
            [
                'client' => $client,
                'auth' => $auth,
                'roles' => $this->roles->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($client_id, $auth_id) {

        $this->auth->update($auth_id, Input::all());

        return Redirect::route('clients.show', $client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        YA\auth\BaseService::destroy($id);

        return Redirect::route('auth.index');
    }

}