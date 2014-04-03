<?php

class HostingServicesController extends \BaseController {

	/**
	 * Display a listing of hostingservices
	 *
	 * @return Response
	 */
	public function index()
	{
		$hostingservices = Hostingservice::all();

		return View::make('hostingservices.index', compact('hostingservices'));
	}

	/**
	 * Show the form for creating a new hostingservice
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hostingservices.create');
	}

	/**
	 * Store a newly created hostingservice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Hostingservice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Hostingservice::create($data);

		return Redirect::route('hostingservices.index');
	}

	/**
	 * Display the specified hostingservice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hostingservice = Hostingservice::findOrFail($id);

		return View::make('hostingservices.show', compact('hostingservice'));
	}

	/**
	 * Show the form for editing the specified hostingservice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hostingservice = Hostingservice::find($id);

		return View::make('hostingservices.edit', compact('hostingservice'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hostingservice = Hostingservice::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hostingservice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hostingservice->update($data);

		return Redirect::route('hostingservices.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hostingservice::destroy($id);

		return Redirect::route('hostingservices.index');
	}

}