<?php

namespace YA\Services\Hosting;

use YA\Observers\SSLCertificateServiceObserver;
use YA\Services\BaseService;

class SSLCertificateService extends BaseService {

    protected $table = 'services';
    protected $stiBaseClass = 'YA\Services\BaseService';

    protected static $rules = [
        'domain' => 'required'
    ];

    protected static $messages = [
        'domain.required' => 'Domain name is required.',
    ];

    protected $fillable = ['domain', 'expires', 'label', 'launch_date', 'expires'];

    public function __construct($attributes = array()) {

        parent::__construct($attributes);

        $this->type = 'SSL Certificate';
    }

    public static function boot() {
        parent::boot();
        static::observe(new SSLCertificateServiceObserver());
    }

}