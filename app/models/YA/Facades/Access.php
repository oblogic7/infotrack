<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/18/14
 * Time: 8:45 PM
 */

namespace YA\Facades;


use Illuminate\Support\Facades\Facade;

class Access extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'access'; }
} 