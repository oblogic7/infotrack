<?php

class DomainServicesController extends \BaseController {

	/**
	 * Display a listing of domainservices
	 *
	 * @return Response
	 */
	public function index()
	{
		$domainservices = Domainservice::all();

		return View::make('domainservices.index', compact('domainservices'));
	}

	/**
	 * Show the form for creating a new domainservice
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('domainservices.create');
	}

	/**
	 * Store a newly created domainservice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Domainservice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Domainservice::create($data);

		return Redirect::route('domainservices.index');
	}

	/**
	 * Display the specified domainservice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$domainservice = Domainservice::findOrFail($id);

		return View::make('domainservices.show', compact('domainservice'));
	}

	/**
	 * Show the form for editing the specified domainservice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$domainservice = Domainservice::find($id);

		return View::make('domainservices.edit', compact('domainservice'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$domainservice = Domainservice::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Domainservice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$domainservice->update($data);

		return Redirect::route('domainservices.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Domainservice::destroy($id);

		return Redirect::route('domainservices.index');
	}

}