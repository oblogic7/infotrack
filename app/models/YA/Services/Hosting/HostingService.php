<?php

namespace YA\Services\Hosting;

use Dryval\ValidationTrait;
use YA\Services\BaseService;

class HostingService extends BaseService {

    use ValidationTrait;

    protected $table = 'services';
    protected $stiBaseClass = 'YA\Services\BaseService';

    protected static $rules = [
        'domain' => 'required',
        'cms' => 'required',
        'launch_date' => 'date'
    ];

    protected static $messages = [
        'domain.required' => 'Domain name is required.'
    ];

    protected $fillable = ['domain', 'provider', 'cms', 'database', 'launch_date'];

    public function __construct($attributes = array()) {

        parent::__construct($attributes);

        $this->type = 'Web Hosting';
    }

}