<?php

namespace YA\Services\Hosting;

use Dryval\ValidationTrait;
use YA\Services\BaseService;

class SEOService extends BaseService {

    use ValidationTrait;

    protected $table = 'services';
    protected $stiBaseClass = 'YA\Services\BaseService';

    protected static $rules = [
        'label' => 'required'
    ];

    protected static $messages = [
        'label.required' => 'Domain name is required.'
    ];

    protected $fillable = ['label'];


    public function __construct($attributes = array()) {
        parent::__construct($attributes);

        $this->type = 'SEO';
    }

}