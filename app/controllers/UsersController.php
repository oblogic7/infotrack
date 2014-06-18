<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/17/14
 * Time: 8:12 PM
 */

class UsersController extends BaseController {

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        $roles = Role::all();

        return View::make('users.index', ['users' => $users, 'roles' => $roles]);
    }
} 