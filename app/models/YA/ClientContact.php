<?php

namespace YA;

class ClientContact extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
		 'phone' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'email', 'phone'];

}