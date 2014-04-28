<?php

class ClientServicesController extends \BaseController {

	/**
	 * Show the form for creating a new service
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('services.create');
	}

	/**
	 * Store a newly created service in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Service::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Service::create($data);

		return Redirect::route('services.index');
	}

	/**
	 * Display the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = YA\Services\BaseService::findOrFail($id);

		return View::make('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = YA\Services\BaseService::find($id);

		return View::make('services.edit', compact('service'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$service = YA\Services\BaseService::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Service::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$service->update($data);

		return Redirect::route('services.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		YA\Services\BaseService::destroy($id);

		return Redirect::route('services.index');
	}

}