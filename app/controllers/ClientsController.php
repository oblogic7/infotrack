<?php

use YA\Client;

class ClientsController extends \BaseController {

    public function __construct(\YA\Contracts\ClientRepositoryInterface $clients) {
        $this->clients = $clients;
    }

    /**
     * Display a listing of clients
     *
     * @return Response
     */
    public function index() {
        return View::make('clients.index')
            ->with(['clients' => $this->clients->all(['credentials', 'contacts', 'services'])]);
    }

    /**
     * Show the form for creating a new client
     *
     * @return Response
     */
    public function create() {
        return View::make('clients.create');
    }

    /**
     * Store a newly created client in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make($data = Input::all(), Client::$rules);

        if ($validator->fails()) {
            return Response::json(['message' => 'Validation Failed.']);
        }

        $client = Client::create($data);

        return Response::json($client);
    }

    /**
     * Display the specified client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {

        return View::make('clients.show')->with(['client' => $this->clients->findById($id)]);

    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $client = Client::find($id);

        return View::make('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id) {
        $client = Client::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Client::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $client->update($data);

        return Redirect::route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        Client::destroy($id);

        return Redirect::route('clients.index');
    }

}