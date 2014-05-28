<?php

namespace YA\Authentication;

use YA\BaseModel;
use YA\Observers\AuthDetailObserver;

class AuthDetail extends BaseModel {

    // Add your validation rules here
    protected static $rules = [
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'url' => 'required|url'
    ];

    protected static $messages = [];

    // Don't forget to fill this array
    protected $fillable = ['name', 'username', 'password', 'url', 'notes'];

    public static function boot() {
        parent::boot();
        static::observe(new AuthDetailObserver());
    }

    public function client() {
        return $this->belongsTo('YA\Client');
    }

    public function service() {
        return $this->belongsTo('YA\Services\BaseService');
    }

    public function software() {
        return $this->belongsTo('YA\Assets\Software\SoftwareDownload');
    }

    public function activity() {
        return $this->hasMany('YA\ActivityLog');
    }

}