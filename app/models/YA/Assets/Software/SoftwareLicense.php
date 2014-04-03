<?php

namespace YA\Assets\Software;

class SoftwareLicense extends \Eloquent
{

	// Add your validation rules here
	public static $rules = [
		'media_type' => 'required',
		'os'         => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['serial', 'available', 'media_type', 'os'];

	public function seats() {
		return $this->hasMany('YA\Assets\Software\SoftwareLicenseSeat');
	}

}