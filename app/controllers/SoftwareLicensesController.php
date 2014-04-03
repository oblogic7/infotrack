<?php

class SoftwareLicensesController extends \BaseController {

	/**
	 * Display a listing of softwarelicenses
	 *
	 * @return Response
	 */
	public function index()
	{
		$softwarelicenses = Softwarelicense::all();

		return View::make('softwarelicenses.index', compact('softwarelicenses'));
	}

	/**
	 * Show the form for creating a new softwarelicense
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('softwarelicenses.create');
	}

	/**
	 * Store a newly created softwarelicense in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Softwarelicense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Softwarelicense::create($data);

		return Redirect::route('softwarelicenses.index');
	}

	/**
	 * Display the specified softwarelicense.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$softwarelicense = Softwarelicense::findOrFail($id);

		return View::make('softwarelicenses.show', compact('softwarelicense'));
	}

	/**
	 * Show the form for editing the specified softwarelicense.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$softwarelicense = Softwarelicense::find($id);

		return View::make('softwarelicenses.edit', compact('softwarelicense'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$softwarelicense = Softwarelicense::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Softwarelicense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$softwarelicense->update($data);

		return Redirect::route('softwarelicenses.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Softwarelicense::destroy($id);

		return Redirect::route('softwarelicenses.index');
	}

}