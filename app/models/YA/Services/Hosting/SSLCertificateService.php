<?php

namespace YA\Services\Hosting;

use Dryval\ValidationTrait;
use YA\Services\BaseService;

class SSLCertificateService extends BaseService {

    use ValidationTrait;

    protected $table = 'services';
    protected $stiBaseClass = 'YA\Services\BaseService';

    protected static $rules = [
        'label' => 'required',
        'expires' => 'required|date'
    ];

    protected static $messages = [
        'label.required' => 'Domain name is required.',
        'expires.required' => 'Expiration date is required.'
    ];

    protected $fillable = ['label', 'expires'];

    public function __construct($attributes = array()) {

        parent::__construct($attributes);

        $this->type = 'SSL Certificate';
    }

}