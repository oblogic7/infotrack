<?php

namespace YA\Services;

use YA\BaseModel;
use YA\Observers\YAServiceObserver;

class BaseService extends BaseModel {

    protected $table = 'services';
    protected $stiClassField = 'service_class';
    protected $stiBaseClass = 'YA\Services\BaseService';

    public static function boot() {

        parent::boot();
        static::observe(new YAServiceObserver());

    }

    public function client() {
        return $this->hasOne('YA\Client');
    }

}