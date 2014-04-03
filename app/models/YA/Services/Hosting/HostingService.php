<?php

namespace YA\Services\Hosting;

use YA\Services\Billing\BillableService;

class HostingService extends BillableService {

	protected $table = 'services';
	protected $stiBaseClass = 'YA\Services\BaseService';

	public function __construct($attributes = array())
	{
		$rules = [
			 'name' => 'required'
		];

		$fillable = ['name'];

		$this->rules = array_merge($this->rules, $rules);
		$this->fillable = array_merge($this->fillable, $fillable);

		parent::__construct($attributes);
	}

}