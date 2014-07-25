<?php

class AuthDetailsController extends \BaseController {

    public function __construct(
        \YA\Contracts\RoleRepositoryInterface $roles,
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Contracts\YAAuthRepositoryInterface $auth) {
        $this->roles = $roles;
        $this->clients = $clients;
        $this->auth = $auth;
    }

	/**
	 * Display a listing of auth
	 *
	 * @return Response
	 */
	public function index()
	{
        $credentials = $this->auth->all();
        return View::make('auth.index')->with(['credentials' => $credentials]);
    }

	/**
	 * Show the form for creating a new auth
	 *
	 * @return Response
	 */
	public function create()
	{
        $roles = $this->roles->all();
        $clients = $this->clients->all();

        return View::make('auth.create')->with(['roles' => $roles, 'clients' => $clients]);
	}

	/**
	 * Store a newly created auth in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        // Validate that password fields match before creating entity.
        if ($input['password'] != $input['password_confirm']) {
            throw new \Dryval\ValidationException('Password fields must match.');
        }

        $auth = $this->auth->create($input);

        return Redirect::route('credentials.show', $auth->id);
	}

	/**
	 * Display the specified auth.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$auth = $this->auth->find($id);

        $activity_data = [
            'activity' => $auth->activity,
            'formRoute' => URL::route('auth.activity.store', [$auth->id])
        ];

		return View::make('auth.show', compact('auth'))
            ->nest('activityLogView', '_partials.activitylog', $activity_data);
	}

	/**
	 * Show the form for editing the specified auth.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$auth = $this->auth->find($id);
        $clients = $this->clients->all();
        $roles = $this->roles->all();

        if ( ! Access::userAuthorized($auth->roles->lists('name')) ) {
            return Redirect::route('credentials.index')->withErrors('Quit that!  You don\'t have permission to do that!');
        }

		return View::make('auth.edit')->with(['auth' => $auth, 'clients' => $clients, 'roles' => $roles]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->auth->update($id, Input::all());

		return Redirect::route('credentials.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Authdetail::destroy($id);

		return Redirect::route('auth.index');
	}

}