<?php

class AuthDetailTypesController extends \BaseController {

	/**
	 * Display a listing of authdetailtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$authdetailtypes = Authdetailstype::all();

		return View::make('authdetailtypes.index', compact('authdetailtypes'));
	}

	/**
	 * Show the form for creating a new authdetailstype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('authdetailtypes.create');
	}

	/**
	 * Store a newly created authdetailstype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Authdetailstype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Authdetailstype::create($data);

		return Redirect::route('authdetailtypes.index');
	}

	/**
	 * Display the specified authdetailstype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$authdetailstype = Authdetailstype::findOrFail($id);

		return View::make('authdetailtypes.show', compact('authdetailstype'));
	}

	/**
	 * Show the form for editing the specified authdetailstype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$authdetailstype = Authdetailstype::find($id);

		return View::make('authdetailtypes.edit', compact('authdetailstype'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$authdetailstype = Authdetailstype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Authdetailstype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$authdetailstype->update($data);

		return Redirect::route('authdetailtypes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Authdetailstype::destroy($id);

		return Redirect::route('authdetailtypes.index');
	}

}