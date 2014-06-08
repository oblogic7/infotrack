<?php

class ClientServicesController extends \BaseController {

    public function __construct(
        \YA\Contracts\ClientRepositoryInterface $clients,
        \YA\Contracts\ServiceRepositoryInterface $services
    ) {
        $this->clients = $clients;
        $this->services = $services;
    }


    /**
     * @param $client_id
     * @return mixed
     */
    public function create($client_id) {

        $client = $this->clients->find($client_id);

        return View::make('services.' . Input::get('type') . '.create')
            ->with(['client' => $client]);
    }


    /**
     * @param $client_id
     * @return mixed
     */
    public function store($client_id) {

        $input = Input::all();

        $service = $this->services->createClientService($input);

        $this->clients->attachService($client_id, $service);

        return Redirect::route('clients.show', $client_id);
    }

    /**
     * Display the specified service.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $service = YA\Services\BaseService::findOrFail($id);

        return View::make('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $service = YA\Services\BaseService::find($id);

        return View::make('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {
        $service = YA\Services\BaseService::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Service::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $service->update($data);

        return Redirect::route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        YA\Services\BaseService::destroy($id);

        return Redirect::route('services.index');
    }

}