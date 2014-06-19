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
    }

    public function hasRole(array $roles) {


        // not an array?  that's an error!
        if(! is_array($roles)) {
            throw new \Exception();
        }

        // return true for empty array
        if(empty($roles)) {
            return true;
        }

        // Return true if user is superadmin.
        if($this->currentUser->role->name == 'Super Admin') {
            return true;
        }

        foreach ($roles as $role) {
            return $this->currentUser->role->name == $role ? true : false;
        }
    }
}