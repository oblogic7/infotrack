<?php

namespace YA\Authentication;

use YA\Observers\AuthDetailObserver;

class AuthDetail extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'username' => 'required',
        'password' => 'required',
        'password_confirm' => 'required|same:password',
        'url' => 'required|url'
    ];

    public static $messages = [
        'password_confirm.same' => "Passwords must match."
    ];

    // Don't forget to fill this array
    protected $fillable = ['label', 'username', 'password', 'url', 'notes'];

    public static function boot() {
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