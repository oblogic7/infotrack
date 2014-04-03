<?php

class LicenseSeatsController extends \BaseController {

	/**
	 * Display a listing of licenseseats
	 *
	 * @return Response
	 */
	public function index()
	{
		$licenseseats = Licenseseat::all();

		return View::make('licenseseats.index', compact('licenseseats'));
	}

	/**
	 * Show the form for creating a new licenseseat
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('licenseseats.create');
	}

	/**
	 * Store a newly created licenseseat in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Licenseseat::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Licenseseat::create($data);

		return Redirect::route('licenseseats.index');
	}

	/**
	 * Display the specified licenseseat.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$licenseseat = Licenseseat::findOrFail($id);

		return View::make('licenseseats.show', compact('licenseseat'));
	}

	/**
	 * Show the form for editing the specified licenseseat.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$licenseseat = Licenseseat::find($id);

		return View::make('licenseseats.edit', compact('licenseseat'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$licenseseat = Licenseseat::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Licenseseat::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$licenseseat->update($data);

		return Redirect::route('licenseseats.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Licenseseat::destroy($id);

		return Redirect::route('licenseseats.index');
	}

}