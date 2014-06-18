<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/17/14
 * Time: 10:29 PM
 */

namespace YA\Composers;

use \User;
use \Auth;

class HeaderNavComposer {

    public function compose($view) {

        if (Auth::check()) {
            $view->with('user', User::find(Auth::user()->id));
        }
    }

} 