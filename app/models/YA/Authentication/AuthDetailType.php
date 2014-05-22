<?php

namespace YA\Authentication;

class AuthDetailType extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    public function activity() {
        return $this->hasMany('YA\ActivityLog');
    }
}