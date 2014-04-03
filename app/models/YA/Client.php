<?php

namespace YA;

class Client extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	public function credentials() {
		return $this->hasOne('YA\Authentication\AuthDetail');
	}

	public function contacts() {
		return $this->hasMany('YA\ClientContact');
	}

}