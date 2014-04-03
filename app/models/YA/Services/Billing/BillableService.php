<?php

namespace YA\Services\Billing;

use YA\Services\BaseService;

class BillableService extends BaseService
{

	protected $table = 'services';
	protected $stiBaseClass = 'YA\Services\BaseService';

	public function __construct($attributes = array())
	{

		$rules = [
			'cost'     => 'required',
			'billable' => 'accepted'
		];

		$fillable = ['cost', 'last_charge_date', 'next_charge_date', 'billing_active', 'billable'];

		$this->rules    = array_merge($this->rules, $rules);
		$this->fillable = array_merge($this->fillable, $fillable);

		parent::__construct($attributes);

		$this->billable = TRUE;

	}

} 