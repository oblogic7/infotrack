<?php

namespace YA\Services\Hosting;

use YA\Services\BaseService;

class DomainService extends BaseService {

    protected $table = 'services';
    protected $stiBaseClass = 'YA\Services\BaseService';

    protected static $rules = [
        'domain' => 'required',
        'provider' => 'required'
    ];

    protected static $messages = [
        'domain.required' => 'Domain name is required.',
        'provider.required' => 'Please enter a provider.'
    ];

    protected $fillable = [
        'domain',
        'provider'
    ];

    public function __construct($attributes = array()) {

        parent::__construct($attributes);

        $this->type = 'Domain Registration';
    }

}