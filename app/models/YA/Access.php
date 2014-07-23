<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/18/14
 * Time: 8:58 PM
 */

namespace YA;


use YA\Contracts\RoleRepositoryInterface;

class Access {

    public function __construct() {
        $this->currentUser = \User::find(\Auth::user()->id);
        $this->currentUserRoles = [$this->currentUser->role->name];
    }

    public function hasRole(array $roles) {

        // Return true if user is superadmin.
        if ($this->currentUser->role->name == 'Super Admin') {
            return true;
        }

        $common = array_intersect($roles, $this->currentUserRoles);

        // if user does not have any authorized roles, return false.
        if (count($common) === 0 && !empty($roles)) {
            return false;
        }

        return true;
    }

    public function userAuthorized(array $roles) {

        return $this->hasRole($roles);

    }

    private function isAdmin() {
        return in_array('Super Admin', $this->currentUserRoles);
    }
}