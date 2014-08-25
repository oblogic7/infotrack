<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 6/17/14
 * Time: 10:33 PM
 */

namespace YA\ServiceProviders;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->view->composer('_partials.header-nav', 'YA\Composers\HeaderNavComposer');
    }
} 