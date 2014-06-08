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
            ->with(['clients' => $this->clients->all()]);
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

            $input = Input::all();

            $client = $this->clients->create($input);

            return Redirect::route('clients.show', array($client->id));

    }

    /**
     * Display the specified client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {

        return View::make('clients.show')->with(['client' => $this->clients->withAllData($id)]);

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
     * @return Redirect
     */
    public function update($id) {

        $client = Client::findOrFail($id);

        $data = Input::all();

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
        $this->clients->destroy($id);

        return Redirect::route('clients.index');
    }

}