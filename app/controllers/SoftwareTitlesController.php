<?php

class SoftwareTitlesController extends \BaseController {

	/**
	 * Display a listing of softwaretitles
	 *
	 * @return Response
	 */
	public function index()
	{
		return \YA\Assets\Software\SoftwareLicense::all();

	}

	/**
	 * Show the form for creating a new softwaretitle
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('softwaretitles.create');
	}

	/**
	 * Store a newly created softwaretitle in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Softwaretitle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Softwaretitle::create($data);

		return Redirect::route('softwaretitles.index');
	}

	/**
	 * Display the specified softwaretitle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$softwaretitle = Softwaretitle::findOrFail($id);

		return View::make('softwaretitles.show', compact('softwaretitle'));
	}

	/**
	 * Show the form for editing the specified softwaretitle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$softwaretitle = Softwaretitle::find($id);

		return View::make('softwaretitles.edit', compact('softwaretitle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$softwaretitle = Softwaretitle::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Softwaretitle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$softwaretitle->update($data);

		return Redirect::route('softwaretitles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Softwaretitle::destroy($id);

		return Redirect::route('softwaretitles.index');
	}

}