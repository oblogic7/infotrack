<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/17/14
 * Time: 8:12 PM
 */

class UsersController extends BaseController {

    public function __construct(
        \YA\Contracts\UserRepositoryInterface $users,
    \YA\Contracts\RoleRepositoryInterface $roles
    ) {
        $this->users = $users;
        $this->roles = $roles;
    }
    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {

        if (! Access::userAuthorized(['Super Admin'])) {
            App::abort(403, 'Unauthorized action.');
        }

        $users = $this->users->all();
        $roles = $this->roles->allWithoutExclusions();

        return View::make('users.index', ['users' => $users, 'roles' => $roles]);
    }

} 