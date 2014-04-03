<?php

class ChargeTypesController extends \BaseController {

	/**
	 * Display a listing of chargetypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$chargetypes = Chargetype::all();

		return View::make('chargetypes.index', compact('chargetypes'));
	}

	/**
	 * Show the form for creating a new chargetype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('chargetypes.create');
	}

	/**
	 * Store a newly created chargetype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Chargetype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Chargetype::create($data);

		return Redirect::route('chargetypes.index');
	}

	/**
	 * Display the specified chargetype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$chargetype = Chargetype::findOrFail($id);

		return View::make('chargetypes.show', compact('chargetype'));
	}

	/**
	 * Show the form for editing the specified chargetype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$chargetype = Chargetype::find($id);

		return View::make('chargetypes.edit', compact('chargetype'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$chargetype = Chargetype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Chargetype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$chargetype->update($data);

		return Redirect::route('chargetypes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Chargetype::destroy($id);

		return Redirect::route('chargetypes.index');
	}

}