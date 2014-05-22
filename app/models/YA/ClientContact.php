<?php

namespace YA;

use Dryval\ValidationTrait;

class ClientContact extends \Eloquent {

    use ValidationTrait;

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
		 'phone' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'email', 'phone', 'type', 'primary'];

    public static function boot() {

    }

    public function activity() {
        return $this->hasMany('YA\ActivityLog');
    }
}