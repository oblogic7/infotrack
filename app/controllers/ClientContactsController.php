<?php

class ClientContactsController extends \BaseController {

	/**
	 * Display a listing of clientcontacts
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientcontacts = Clientcontact::all();

		return View::make('clientcontacts.index', compact('clientcontacts'));
	}

	/**
	 * Show the form for creating a new clientcontact
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clientcontacts.create');
	}

	/**
	 * Store a newly created clientcontact in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Clientcontact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Clientcontact::create($data);

		return Redirect::route('clientcontacts.index');
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

		return View::make('clientcontacts.show', compact('clientcontact'));
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

		return View::make('clientcontacts.edit', compact('clientcontact'));
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

		return Redirect::route('clientcontacts.index');
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

		return Redirect::route('clientcontacts.index');
	}

}