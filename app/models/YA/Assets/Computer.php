<?php

namespace YA\Assets;

class Computer extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'cpu', 'memory', 'serial', 'os', 'purchase_date'];

}