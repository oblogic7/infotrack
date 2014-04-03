<?php

namespace YA\Assets\Software;

class SoftwareDownload extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'url' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['url'];

	public function credentials() {
		return $this->hasOne('YA\Authentication\AuthDetail');
	}

}