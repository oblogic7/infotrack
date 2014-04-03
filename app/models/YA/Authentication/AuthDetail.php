<?php

namespace YA\Authentication;

class AuthDetail extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'username' => 'required',
		 'password' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['description', 'username', 'password', 'url', 'notes'];

	public function client() {
		return $this->belongsTo('YA\Client');
	}

	public function service() {
		return $this->belongsTo('YA\Services\BaseService');
	}

	public function software() {
		return $this->belongsTo('YA\Assets\Software\SoftwareDownload');
	}

}