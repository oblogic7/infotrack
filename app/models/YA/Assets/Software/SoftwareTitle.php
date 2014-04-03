<?php

namespace YA\Assets\Software;

class SoftwareTitle extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	public function licenses() {
		return $this->hasMany('YA\Assets\Software\SoftwareLicense');
	}

	public function downloads() {
		return $this->hasMany('YA\Assets\Software\SoftwareDownload');
	}

}