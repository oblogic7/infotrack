<?php

namespace YA\Services;

use Dryval\ValidationTrait;
use YA\BaseModel;
use YA\Observers\YAServiceObserver;

class BaseService extends BaseModel {

    use ValidationTrait;

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

    public function activity() {
        return $this->hasMany('YA\ActivityLog', 'service_id');
    }

}