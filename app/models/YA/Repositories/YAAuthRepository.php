<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 5/19/14
 * Time: 11:08 PM
 */

namespace YA\Repositories;


use YA\Authentication\AuthDetail;
use YA\Contracts\YAAuthRepositoryInterface;

class YAAuthRepository extends AbstractRepository implements YAAuthRepositoryInterface
{

    protected $modelClassName = '\YA\Authentication\AuthDetail';

    //TODO: write find method that eager loads forClients.

    public function all($columns = array())
    {

        $auth = AuthDetail::where('client_id', null)->with('forClients')->get();

        // Setup token data for each item
        foreach ($auth as &$a) {
            $a->token = $a->name . ' ';

            foreach ($a->forClients as $client) {
                $a->token .= $client->name . ' ';
            }
        }

        return $auth;
    }

    public function typeahead()
    {
        return $this->all();
    }

    public function create(array $input)
    {
        $auth = parent::create($input);

        // if roles are specified, set them here.
        if (isset($input['roles'])) {
            foreach ($input['roles'] as $role) {
                $auth->roles()->attach($role);
            }
        }

        if (isset($input['clients'])) {
            foreach ($input['clients'] as $client) {
                $auth->forClients()->attach($client);
            }
        }

        return $auth;
    }

    public function update($id, $input)
    {
        $auth = $this->find($id);

        $auth->fill($input);

        $auth->save();

        // if roles are specified, set them here.
        if (isset($input['roles'])) {

            // detach all roles.
            foreach ($auth->roles as $role) {
                $auth->roles()->detach($role->id);
            }

            // Apply roles passed via input
            foreach ($input['roles'] as $role) {
                $auth->roles()->attach($role);
            }
        }

        if (isset($input['clients'])) {

            // detach all clients.
            foreach ($auth->forClients as $client) {
                $auth->forClients()->detach($client->id);
            }

            // attach clients specified in input.
            foreach ($input['clients'] as $client) {
                $auth->forClients()->attach($client);
            }
        }

        return $auth;
    }
}