<?php

class ClientContactsController extends \BaseController {

    public function __construct(
        \YA\Contracts\ClientContactRepositoryInterface $contacts,
        \YA\Contracts\ClientRepositoryInterface $clients) {
        $this->contacts = $contacts;
        $this->clients = $clients;
    }

	/**
	 * Display a listing of clientcontacts
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('clients.contacts.index')->with(array('contacts' => $this->contacts->all()));
	}


	public function create($client_id)
	{
        $client = $this->clients->find($client_id);

		return View::make('clients.contacts.create')->with(['client' => $client]);
	}

	public function store($client_id)
	{
        $input = Input::all();

		$contact = $this->contacts->create($input);

        $this->clients->attachContact($client_id, $contact);

		return Redirect::route('clients.show', $client_id);
	}

	/**
	 * Display the specified clientcontact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$clientcontact = Clientcontact::findOrFail($id);

		return View::make('clients.contacts.show', compact('clientcontact'));
	}

	/**
	 * Show the form for editing the specified clientcontact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientcontact = Clientcontact::find($id);

		return View::make('clients.contacts.edit', compact('clientcontact'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$clientcontact = Clientcontact::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Clientcontact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$clientcontact->update($data);

		return Redirect::route('clients.contacts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Clientcontact::destroy($id);

		return Redirect::route('clients.contacts.index');
	}

}