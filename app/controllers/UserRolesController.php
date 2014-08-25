<?php

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 7/22/14
 * Time: 10:30 PM
 */
class UserRolesController extends BaseController {

    public function __construct(
        \YA\Contracts\RoleRepositoryInterface $roles,
        \YA\Contracts\UserRepositoryInterface $user
    ) {
        $this->roles = $roles;
        $this->user = $user;
    }

    public function update($user_id, $role_id) {

        if (! Access::userAuthorized(['Super Admin'])) {
            App::abort(403, 'Unauthorized action.');
        }

        $user = $this->user->find($user_id);
        $role = $this->roles->find($role_id);

        if ($user->role()->associate($role)->save()) {
            return Response::json(array('status' => 'Success'));
        }
    }
} 