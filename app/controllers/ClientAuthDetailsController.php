<?php

class ClientAuthDetailsController extends \BaseController {

    public function __construct(
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Contracts\ClientAuthRepositoryInterface $auth
    ) {
        $this->clients = $clients;
        $this->auth = $auth;
    }


	public function create($client_id)
	{
        $client = $this->clients->find($client_id);

		return View::make('clients.auth.create')->with(['client' => $client]);
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

        $this->clients->attachCredentials($client_id, $auth);

        return Redirect::route('clients.show', $client->id);
	}

	/**
	 * Display the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$auth = YA\Services\BaseService::findOrFail($id);

		return View::make('auth.show', compact('service'));
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