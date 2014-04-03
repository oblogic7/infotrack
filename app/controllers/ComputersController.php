<?php

class ComputersController extends \BaseController {

	/**
	 * Display a listing of computers
	 *
	 * @return Response
	 */
	public function index()
	{
		$computers = Computer::all();

		return View::make('computers.index', compact('computers'));
	}

	/**
	 * Show the form for creating a new computer
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('computers.create');
	}

	/**
	 * Store a newly created computer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Computer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Computer::create($data);

		return Redirect::route('computers.index');
	}

	/**
	 * Display the specified computer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$computer = Computer::findOrFail($id);

		return View::make('computers.show', compact('computer'));
	}

	/**
	 * Show the form for editing the specified computer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$computer = Computer::find($id);

		return View::make('computers.edit', compact('computer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$computer = Computer::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Computer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$computer->update($data);

		return Redirect::route('computers.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Computer::destroy($id);

		return Redirect::route('computers.index');
	}

}