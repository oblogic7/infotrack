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
	 * Show the form for editing the specified clientcontact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($client_id, $contact_id)
	{
		$contact = $this->contacts->find($contact_id);
        $client = $this->clients->find($client_id);

		return View::make('clients.contacts.edit')->with(['contact' => $contact, 'client' => $client]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($client_id, $contact_id)
	{

		$this->contacts->update($contact_id, Input::all());

		return Redirect::route('clients.show', $client_id);
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