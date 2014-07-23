<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/18/14
 * Time: 2:56 PM
 */

namespace YA\Repositories;


use YA\Contracts\RoleRepositoryInterface;
use \Role;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface {

    protected $modelClassName = '\Role';

    /**
     * Exclude these ids from results
     * 1 = Super Admin
     */
    protected $excludedRoles = [2];

    public function all($columns = array('*')) {
        // return all roles except super admin.
        return Role::whereNotIn('id', $this->excludedRoles)->get();
    }

    public function allWithoutExclusions($columns = array('*')) {
        // return all roles except super admin.
        return Role::all();
    }

    public function findByName($roleName) {
        return Role::where('name', '=', $roleName)->firstorFail();
    }

} 