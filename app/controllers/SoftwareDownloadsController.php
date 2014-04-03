<?php

class SoftwareDownloadsController extends \BaseController {

	/**
	 * Display a listing of softwaredownloads
	 *
	 * @return Response
	 */
	public function index()
	{
		$softwaredownloads = Softwaredownload::all();

		return View::make('softwaredownloads.index', compact('softwaredownloads'));
	}

	/**
	 * Show the form for creating a new softwaredownload
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('softwaredownloads.create');
	}

	/**
	 * Store a newly created softwaredownload in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Softwaredownload::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Softwaredownload::create($data);

		return Redirect::route('softwaredownloads.index');
	}

	/**
	 * Display the specified softwaredownload.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$softwaredownload = Softwaredownload::findOrFail($id);

		return View::make('softwaredownloads.show', compact('softwaredownload'));
	}

	/**
	 * Show the form for editing the specified softwaredownload.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$softwaredownload = Softwaredownload::find($id);

		return View::make('softwaredownloads.edit', compact('softwaredownload'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$softwaredownload = Softwaredownload::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Softwaredownload::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$softwaredownload->update($data);

		return Redirect::route('softwaredownloads.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Softwaredownload::destroy($id);

		return Redirect::route('softwaredownloads.index');
	}

}