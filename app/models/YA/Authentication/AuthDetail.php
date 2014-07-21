<?php

namespace YA\Authentication;

use YA\BaseModel;
use YA\Observers\AuthDetailObserver;

class AuthDetail extends BaseModel {

    // Add your validation rules here
    protected static $rules = [
        'name' => 'required',
        'url' => 'required|url',
        'username' => 'required',
        'password' => 'required',
    ];

    protected static $messages = [
        'url.required' => 'You must enter a URL where this login can be used.'
    ];

    protected $touches = ['client'];

    // Don't forget to fill this array
    protected $fillable = ['name', 'username', 'password', 'url', 'notes', 'client_id'];

    public static function boot() {
        parent::boot();
        static::observe(new AuthDetailObserver());
    }

    public function client() {
        return $this->belongsTo('YA\Client');
    }

    public function forClients() {
        return $this->belongsToMany('YA\Client');
    }

    public function software() {
        return $this->belongsTo('YA\Assets\Software\SoftwareDownload');
    }

    public function activity() {
        return $this->hasMany('YA\ActivityLog');
    }

    public function roles() {
        return $this->belongsToMany('Role');
    }

}