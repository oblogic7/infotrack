<?php

class AuthDetailsController extends \BaseController {

	/**
	 * Display a listing of authdetail
	 *
	 * @return Response
	 */
	public function index()
	{
		return Authdetail::all();
	}

	/**
	 * Show the form for creating a new authdetail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('authdetail.create');
	}

	/**
	 * Store a newly created authdetail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Authdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Authdetail::create($data);

		return Redirect::route('authdetail.index');
	}

	/**
	 * Display the specified authdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$authdetail = Authdetail::findOrFail($id);

		return View::make('authdetail.show', compact('authdetail'));
	}

	/**
	 * Show the form for editing the specified authdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$authdetail = Authdetail::find($id);

		return View::make('authdetail.edit', compact('authdetail'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$authdetail = Authdetail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Authdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$authdetail->update($data);

		return Redirect::route('authdetail.index');
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

		return Redirect::route('authdetail.index');
	}

}