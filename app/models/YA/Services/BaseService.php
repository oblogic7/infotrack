<?php

namespace YA\Services;

use YA\BaseModel;

class BaseService extends BaseModel {

	protected $table = 'services';
	protected $stiClassField = 'service_class';
	protected $stiBaseClass = 'YA\Services\BaseService';

	public $rules = array();
	public $fillable = array();

	public function credentials() {
		return $this->hasOne('YA\Authentication\AuthDetails');
	}

}